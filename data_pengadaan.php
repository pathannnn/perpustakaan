<?php
include "header.php";
include "koneksi.php";

if(isset($_POST['cari'])) {
    $cari = $_POST['cari'];
    $query = "SELECT p.id_pengadaan, p.tgl_pengadaan, b.judul, p.asal_buku, p.jumlah, p.keterangan, p.id_admin 
              FROM pengadaan p 
              JOIN buku b ON p.id_buku = b.id_buku 
              WHERE p.id_pengadaan LIKE '%$cari%' OR b.judul LIKE '%$cari%' OR p.asal_buku LIKE '%$cari%' 
              ORDER BY p.tgl_pengadaan DESC";
} else {
    $query = "SELECT p.id_pengadaan, p.tgl_pengadaan, b.judul, p.asal_buku, p.jumlah, p.keterangan, p.id_admin 
              FROM pengadaan p 
              JOIN buku b ON p.id_buku = b.id_buku 
              ORDER BY p.tgl_pengadaan DESC";
}

$result = mysqli_query($koneksi, $query);
if (!$result) {
    echo "Error: " . mysqli_error($koneksi);
    exit;
}

?>

<div class="container mt-5">
    <h2>Data Pengadaan</h2>
    <form action="" method="post">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="cari" placeholder="Cari...">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Cari</button>
            </div>
        </div>
    </form>
    <a href="tambah_pengadaan.php" class="btn btn-success">Tambah Pengadaan</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID Pengadaan</th>
                <th>Tanggal Pengadaan</th>
                <th>Judul Buku</th>
                <th>Asal Buku</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
                <th>Admin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['id_pengadaan'] ?></td>
                <td><?= date("d-m-Y", strtotime($row['tgl_pengadaan'])) ?></td>
                <td><?= $row['judul'] ?></td>
                <td><?= $row['asal_buku'] ?></td>
                <td><?= $row['jumlah'] ?></td>
                <td><?= $row['keterangan'] ?></td>
                <td><?= $row['id_admin'] ?></td>
                <td>
                    <a href="edit_pengadaan.php?id=<?= $row['id_pengadaan'] ?>" class="btn btn-primary">Edit</a>
                    <a href="hapus_pengadaan.php?id=<?= $row['id_pengadaan'] ?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php
include "footer.html";
?>