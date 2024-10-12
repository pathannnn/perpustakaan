<?php
include "koneksi.php";

// Pastikan ada ID buku yang dikirim
if(isset($_GET['id'])) {
    $id_buku = $_GET['id'];
    
    // Jika konfirmasi sudah diberikan
    if(isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
        // Lakukan penghapusan
        $query = "DELETE FROM buku WHERE id_buku = '$id_buku'";
        $result = mysqli_query($koneksi, $query);
        
        if($result) {
            // Redirect ke data_buku.php dengan pesan sukses
            header("Location: data_buku.php?status=deleted");
            exit();
        } else {
            echo "<script>alert('Gagal menghapus data!'); window.location.href='data_buku.php';</script>";
        }
    } else {
        // Tampilkan konfirmasi
        echo "
        <script>
            var confirmDelete = confirm('Apakah Anda yakin ingin menghapus buku ini?');
            if(confirmDelete) {
                window.location.href = 'hapus_buku.php?id=$id_buku&confirm=yes';
            } else {
                window.location.href = 'data_buku.php';
            }
        </script>
        ";
    }
} else {
    // Jika tidak ada ID buku, kembali ke data_buku.php
    header("Location: data_buku.php");
    exit();
}
?>