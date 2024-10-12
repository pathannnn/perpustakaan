<?php
include "koneksi.php";

if(isset($_GET['nisn'])) {
    $nisn = $_GET['nisn'];
    
    // Periksa apakah siswa dengan NISN tersebut ada
    $check_query = "SELECT * FROM siswa WHERE nisn = '$nisn'";
    $check_result = mysqli_query($koneksi, $check_query);
    
    if(mysqli_num_rows($check_result) > 0) {
        // Jika siswa ditemukan, lakukan penghapusan
        $delete_query = "DELETE FROM siswa WHERE nisn = '$nisn'";
        
        if(mysqli_query($koneksi, $delete_query)) {
            echo "<script>
                    alert('Data siswa berhasil dihapus!');
                    window.location='data_siswa.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Gagal menghapus data siswa: " . mysqli_error($koneksi) . "');
                    window.location='data_siswa.php';
                  </script>";
        }
    } else {
        // Jika siswa tidak ditemukan
        echo "<script>
                alert('Data siswa tidak ditemukan!');
                window.location='data_siswa.php';
              </script>";
    }
} else {
    // Jika NISN tidak ada dalam parameter GET
    echo "<script>
            alert('NISN tidak valid!');
            window.location='data_siswa.php';
          </script>";
}

mysqli_close($koneksi);
?>