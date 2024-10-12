<?php
include "header.php";
include "koneksi.php";

// Ambil ID kategori dari parameter URL
$id_kategori = $_GET['id'];

// Jika form disubmit
if(isset($_POST['submit'])) {
    $nama_kategori = $_POST['nama_kategori'];
    
    // Update data kategori
    $query = "UPDATE kategori SET nama_kategori = '$nama_kategori' WHERE id_kategori = '$id_kategori'";
    $result = mysqli_query($koneksi, $query);
    
    if($result) {
        // Redirect ke data_kategori.php dengan pesan sukses
        header("Location: data_kategori.php?status=success");
        exit();
    } else {
        echo "<script>alert('Gagal mengupdate data!');</script>";
    }
}

// Ambil data kategori yang akan diedit
$query = "SELECT * FROM kategori WHERE id_kategori = '$id_kategori'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-2">
            <div class="card">
                <div class="card-header">
                    Edit Kategori
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="id_kategori">ID Kategori</label>
                            <input type="text" class="form-control" id="id_kategori" name="id_kategori" value="<?php echo $data['id_kategori']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama_kategori">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?php echo $data['nama_kategori']; ?>" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
                        <a href="data_kategori.php" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "footer.html";
?>