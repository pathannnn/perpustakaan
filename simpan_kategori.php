<?php 
    include "koneksi.php";
    
    $nama_kategori = $_POST['nama_kategori'];
    $query = mysqli_query($koneksi, "INSERT INTO kategori VALUES (NULL, '$nama_kategori')");

    header('location: data_kategori.php');

    if ($query) {
        echo "Data berhasil disimpan.";
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($koneksi);
    }
?>
