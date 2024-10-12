<?php
include "header.php";

// Ambil ID buku dari parameter URL
$id_buku = $_GET['id'];

// Jika form disubmit
if(isset($_POST['submit'])) {
    $isbn = $_POST['isbn'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $id_kategori = $_POST['id_kategori'];
    $tahun_terbit = $_POST['tahun_terbit'];
    
    // Update data buku
    $query = "UPDATE buku SET isbn = '$isbn', judul = '$judul', penulis = '$penulis', id_kategori = '$id_kategori', tahun_terbit = '$tahun_terbit' WHERE id_buku = '$id_buku'";
    $result = mysqli_query($koneksi, $query);
    
    if($result) {
        // Redirect ke data_buku.php dengan pesan sukses
        header("Location: data_buku.php?status=success");
        exit();
    } else {
        echo "<script>alert('Gagal mengupdate data!');</script>";
    }
}

// Ambil data buku yang akan diedit
$query = "SELECT * FROM buku WHERE id_buku = '$id_buku'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

// Ambil data kategori untuk dropdown
$query_kategori = "SELECT * FROM kategori";
$result_kategori = mysqli_query($koneksi, $query_kategori);
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-2">
            <div class="card">
                <div class="card-header">
                    Edit Buku
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="id_buku">ID Buku</label>
                            <input type="text" class="form-control" id="id_buku" name="id_buku" value="<?php echo $data['id_buku']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="isbn">ISBN</label>
                            <input type="text" class="form-control" id="isbn" name="isbn" value="<?php echo $data['isbn']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $data['judul']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="penulis">Penulis</label>
                            <input type="text" class="form-control" id="penulis" name="penulis" value="<?php echo $data['penulis']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="id_kategori">Kategori</label>
                            <select class="form-control" id="id_kategori" name="id_kategori" required>
                                <?php while($kategori = mysqli_fetch_assoc($result_kategori)) { ?>
                                    <option value="<?php echo $kategori['id_kategori']; ?>" <?php if($kategori['id_kategori'] == $data['id_kategori']) echo 'selected'; ?>>
                                        <?php echo $kategori['nama_kategori']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                 </div>
                        <div class="form-group">
                            <label for="tahun_terbit">Tahun Terbit</label>
                            <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" value="<?php echo $data['tahun_terbit']; ?>" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "footer.html";
?>