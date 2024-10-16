<?php 
    include "koneksi.php";
?>
    
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <title>Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      /* Atur tinggi body dan html agar 100% tinggi layar */
      html, body {
        height: 100%;
        margin: 0;
        display: flex;
        flex-direction: column;
      }

      .jumbotron {
        background-color: rgba(0, 123, 255, 0.2);
        padding: 3rem 2rem;
        border-radius: 0.5rem;
        margin-top: 20px;
      }

      .card {
        transition: transform 0.3s;
      }

      .card:hover {
        transform: scale(1.05);
      }
    </style>
  </head>

  <body>
    <!-- Start Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">Perpustakaan</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="home.php">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Data Master
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="data_buku.php">Buku</a></li>
                <li><a class="dropdown-item" href="data_kategori.php">Kategori</a></li>
                <li><a class="dropdown-item" href="data_siswa.php">Siswa</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Transaksi
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="data_peminjaman.php">Peminjaman</a></li>
                <li><a class="dropdown-item" href="data_pengadaan.php">Pengadaan</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="data_admin.php">Admin</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->