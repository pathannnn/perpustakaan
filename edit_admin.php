<?php
include "header.php";
// Koneksi sudah ada di header.php

// Cek apakah ada parameter id_admin
if(isset($_GET['id_admin']) && !empty($_GET['id_admin'])) {
    $id_admin = mysqli_real_escape_string($koneksi, $_GET['id_admin']);
    
    // Ambil data admin berdasarkan id_admin
    $query = "SELECT * FROM admin WHERE id_admin = '$id_admin'";
    $result = mysqli_query($koneksi, $query);
    
    if(mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
    } else {
        echo "<div class='alert alert-danger'>Data admin tidak ditemukan.</div>";
        exit();
    }
} else {
    echo "<div class='alert alert-danger'>ID admin tidak diberikan. Silahkan kembali ke <a href='data_admin.php'>halaman data admin</a>.</div>";
    exit();
}

// Sisa kode tetap sama

// Proses form jika disubmit
if(isset($_POST['submit'])) {
    $nama_lengkap = mysqli_real_escape_string($koneksi, $_POST['nama_lengkap']);
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    
    $query = "UPDATE admin SET nama_lengkap = '$nama_lengkap', username = '$username'";
    
    // Jika password diisi, update password
    if(!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $query .= ", password = '$password'";
    }
    
    $query .= " WHERE id_admin = '$id_admin'";
    
    if(mysqli_query($koneksi, $query)) {
        header("Location: data_admin.php?status=success_update");
        exit();
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
                    Edit Admin
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
                            <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $data['nama_lengkap']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $data['username']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password (Kosongkan jika tidak ingin mengubah)</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
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