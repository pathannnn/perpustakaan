<?php
    include "header.php";
?>
    
    <!-- Start Content -->
    <div class="content-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-12 mt-4 mb-4">
            <div class="jumbotron text-center">
              <h1 class="display-4">Selamat Datang</h1>
              <p class="lead">Selamat menjelajah aplikasi perpustakaan sekolah berbasis web dengan PHP, MySQL, dan Bootstrap.</p>
            </div>
          </div>
        </div>
        
        <div class="row g-4">
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Peminjaman</h5>
                <p class="card-text">Jumlah transaksi peminjaman </p>
                <a href="data_peminjaman.php" class="btn btn-primary">Peminjaman</a>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Admin</h5>
                <p class="card-text">Jumlah admin </p>
                <a href="data_admin.php" class="btn btn-primary">Data Admin</a>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Data Buku</h5>
                <p class="card-text">Jumlah buku yang tersedia </p>
                <a href="data_buku.php" class="btn btn-primary">Data Buku</a>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Data Siswa</h5>
                <p class="card-text">Jumlah siswa yang ada</p>
                <a href="data_siswa.php" class="btn btn-primary">Data Siswa</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Content -->

<?php
    include "footer.html";
?>