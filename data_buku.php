<?php
    include "header.php";
?>

<?php
if(isset($_GET['status']) && $_GET['status'] == 'success') {
    echo '<div id="successAlert" class="alert alert-success" role="alert">Data berhasil diupdate!</div>';
}
?>

<div class="container">
        <div class="row">
            <div class="col-lg-12 mt-2" style="min-height: 500px;">
            <div class="card">
                <div class="card-header">
                    Data Buku
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <a href="tambah_buku.php" class="btn btn-primary">Tambah Data</a>
                        </div>
                        <div class="col">
                            <form action="" class="d-flex justify-content-end" method="GET">
                                <div class="input-group" style="max-width: 300px;">
                                    <input type="text" class="form-control" placeholder="Cari data" name="keyword" aria-label="Cari data">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <table class="table table-bordered table-striped"> 
                                <tr>
                                    <th>No</th>
                                    <th>ID Buku</th>
                                    <th>ISBN</th>
                                    <th>Judul</th>
                                    <th>Penulis</th>
                                    <th>Kategori</th>
                                    <th>Tahun Terbit</th>
                                    <th>Aksi</th>
                                </tr>
                                <?php
                                if(isset($_GET['keyword']) && !empty($_GET['keyword'])){
                                    $keyword = $_GET['keyword'];
                                    $query = mysqli_query($koneksi, "SELECT buku.*, kategori.nama_kategori 
                                                                    FROM buku 
                                                                    LEFT JOIN kategori ON buku.id_kategori = kategori.id_kategori
                                                                    WHERE buku.judul LIKE '%$keyword%' 
                                                                    OR buku.penulis LIKE '%$keyword%' 
                                                                    OR buku.isbn LIKE '%$keyword%'");
                                } else {
                                    $query = mysqli_query($koneksi, "SELECT buku.*, kategori.nama_kategori 
                                                                    FROM buku 
                                                                    LEFT JOIN kategori ON buku.id_kategori = kategori.id_kategori");
                                }
                                
                                $no = 1;
                                while ($ambil_data = mysqli_fetch_array($query)) {  
                                    // Generate ID Buku otomatis dengan 4 angka
                                    $id_buku = str_pad($ambil_data['id_buku'], 4, '0', STR_PAD_LEFT);
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $id_buku; ?></td>
                                    <td><?php echo isset($ambil_data['isbn']) ? $ambil_data['isbn'] : 'N/A'; ?></td>
                                    <td><?php echo isset($ambil_data['judul']) ? $ambil_data['judul'] : 'N/A'; ?></ td>
                                    <td><?php echo isset($ambil_data['penulis']) ? $ambil_data['penulis'] : 'N/A'; ?></td>
                                    <td><?php echo isset($ambil_data['nama_kategori']) ? $ambil_data['nama_kategori'] : 'N/A'; ?></td>
                                    <td><?php echo isset($ambil_data['tahun_terbit']) ? $ambil_data['tahun_terbit'] : 'N/A'; ?></td>
                                    <td>
                                        <a href="edit_buku.php?id=<?php echo $ambil_data['id_buku']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="hapus_buku.php?id=<?php echo $ambil_data['id_buku']; ?>" class="btn btn-sm btn-danger">Hapus</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include "footer.html";
?>