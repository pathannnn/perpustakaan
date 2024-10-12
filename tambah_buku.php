<?php
include "header.php";
include "koneksi.php";

if(isset($_POST['submit'])){
    $isbn = $_POST['isbn'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $kategori = $_POST['kategori'];
    $tahun_terbit = $_POST['tahun_terbit'];

    $query = mysqli_query($koneksi, "INSERT INTO buku (isbn, judul, penulis, id_kategori, tahun_terbit) VALUES ('$isbn', '$judul', '$penulis', '$kategori', '$tahun_terbit')");

    if($query){
        echo "<script>alert('Data berhasil ditambahkan!'); window.location='data_buku.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data.'); window.location='tambah_buku.php';</script>";
    }
}
?>

<div class="container mt-5">
    <h2>Tambah Buku</h2>
    <form action="" method="post">
        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" class="form-control" id="isbn" name="isbn" required>
        </div>
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Buku</label>
            <input type="text" class="form-control" id="judul" name="judul" required>
        </div>
        <div class="mb-3">
            <label for="penulis" class="form-label">Penulis</label>
            <input type="text" class="form-control" id="penulis" name="penulis" required>
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-select" id="kategori" name="kategori" required>
                <option value="">Pilih Kategori</option>
                <?php
                $query_kategori = mysqli_query($koneksi, "SELECT * FROM kategori");
                while($kategori = mysqli_fetch_assoc($query_kategori)){
                    echo "<option value='".$kategori['id_kategori']."'>".$kategori['nama_kategori']."</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
            <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Tambah Buku</button>
        <a href="data_buku.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php
include "footer.html";
?>