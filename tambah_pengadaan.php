<?php
include "header.php";
include "koneksi.php";

if(isset($_POST['tambah'])) {
    $id_pengadaan = $_POST['id_pengadaan'];
    $tgl_pengadaan = $_POST['tgl_pengadaan'];
    $id_buku = $_POST['id_buku'];
    $asal_buku = $_POST['asal_buku'];
    $jumlah = $_POST['jumlah'];
    $keterangan = $_POST['keterangan'];
    $id_admin = $_POST['id_admin'];

    $query = "INSERT INTO pengadaan (id_pengadaan, tgl_pengadaan, id_buku, asal_buku, jumlah, keterangan, id_admin) 
              VALUES ('$id_pengadaan', '$tgl_pengadaan', '$id_buku', '$asal_buku', '$jumlah', '$keterangan', '$id_admin')";
    $result = mysqli_query($koneksi, $query);

    if($result) {
        echo "<script>alert('Data pengadaan berhasil ditambahkan!'); window.location='data_pengadaan.php'</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data pengadaan!'); window.location='tambah_pengadaan.php'</script>";
    }
}

?>

<div class="container mt-5">
    <h2>Tambah Pengadaan</h2>
    <form action="" method="post">
        <div class="form-group">
            <label for="id_pengadaan">ID Pengadaan</label>
            <input type="text" class="form-control" id="id_pengadaan" name="id_pengadaan" required>
        </div>
        <div class="form-group">
            <label for="tgl_pengadaan">Tanggal Pengadaan</label>
            <input type="date" class="form-control" id="tgl_pengadaan" name="tgl_pengadaan" required>
        </div>
        <div class="form-group">
            <label for="id_buku">ID Buku</label>
            <input type="text" class="form-control" id="id_buku" name="id_buku" required>
        </div>
        <div class="form-group">
            <label for="asal_buku">Asal Buku</label>
            <input type="text" class="form-control" id="asal_buku" name="asal_buku" required>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" required>
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan" required></textarea>
        </div>
        <div class="form-group">
            <label for="id_admin">ID Admin</label>
            <input type="text" class="form-control" id="id_admin" name="id_admin" required>
        </div>
        <button type="submit" name="tambah" class="btn btn-primary">Tambah Pengadaan</button>
    </form>
</div>

<?php
include "footer.html";
?>