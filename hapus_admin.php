<?php
include "header.php";
// Koneksi sudah ada di header.php

// Cek apakah ada parameter id_admin
if(isset($_GET['id_admin'])) {
    $id_admin = mysqli_real_escape_string($koneksi, $_GET['id_admin']);
    
    // Hapus data admin berdasarkan id_admin
    $query = "DELETE FROM admin WHERE id_admin = '$id_admin'";
    
    if(mysqli_query($koneksi, $query)) {
        // Jika berhasil dihapus, redirect ke halaman data admin dengan status sukses
        header("Location: data_admin.php?status=success_delete");
        exit();
    } else {
        // Jika gagal, tampilkan pesan error
        $error = "Error: " . mysqli_error($koneksi);
    }
} else {
    // Jika tidak ada id_admin yang diberikan, tampilkan pesan error
    $error = "ID admin tidak diberikan.";
}

// Jika terjadi error, tampilkan pesan error
if(isset($error)) {
?>
    <div class="container mt-4">
        <div class="alert alert-danger" role="alert">
            <?php echo $error; ?>
        </div>
        <a href="data_admin.php" class="btn btn-primary">Kembali ke Data Admin</a>
    </div>
<?php
}

include "footer.html";
?>