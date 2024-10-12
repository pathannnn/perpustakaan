<?php
    $koneksi=mysqli_connect("localhost", "root","", "library");
    if (!$koneksi){
        echo "Koneksi Gagal";
    }