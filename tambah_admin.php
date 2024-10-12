<?php
include "header.php";
include "koneksi.php";

if(isset($_POST['submit'])) {
    $nama_lengkap = mysqli_real_escape_string($koneksi, $_POST['nama_lengkap']);
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi password
    
    $query = "INSERT INTO admin (nama_lengkap, username, password) VALUES ('$nama_lengkap', '$username', '$password')";
    
    if(mysqli_query($koneksi, $query)) {
        header("Location: data_admin.php?status=success");
    } else {
        $error = "Error: " . mysqli_error($koneksi);
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-2">
            <div class="card">
                <div class="card-header">
                    Tambah Admin
                </div>
                <div class="card-body">
                    <?php
                    if(isset($error)) {
                        echo "<div class='alert alert-danger'>$error</div>";
                    }
                    ?>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                        <a href="data_admin.php" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "footer.html";
?>