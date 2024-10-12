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
                Data Kategori
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <a href="tambah_kategori.php" class="btn btn-primary">Tambah Data</a>
                    </div>
                    <div class="col">
                        <!-- Form pencarian dengan layout sejajar -->
                        <form action="" class="d-flex justify-content-end" method="GET">
                            <div class="input-group" style="max-width: 300px;">
                                <!-- Input text pencarian -->
                                <input type="text" class="form-control" placeholder="Cari data" name="keyword" aria-label="Cari data">
                                <!-- Tombol submit dengan ukuran yang sesuai -->
                                <button type="submit" class="btn btn-primary">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <table class="table table-bordered table-striped"> 
                            <tr>
                                <th> No </th>
                                <th> Kode Kategori</th>
                                <th> Nama Kategori</th>
                                <th> Aksi</th>
                            </tr>
                            <?php
                            // Cek apakah tombol cari ditekan
                            if(isset($_GET['cari']) && !empty($_GET['keyword'])){
                                $keyword = $_GET['keyword'];
                                // Query dengan pencarian berdasarkan nama_kategori
                                $query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE nama_kategori LIKE '%$keyword%'");
                            } else {
                                // Query default tanpa pencarian
                                $query = mysqli_query($koneksi, "SELECT * FROM kategori");
                            }
                            
                            $no = 1;
                            // Looping data dari query
                            while ($ambil_data = mysqli_fetch_array($query)) {  
                            ?>
                            <tr>
                                <td> <?php echo $no++; ?> </td>
                                <td> <?php echo isset($ambil_data['id_kategori']) ? $ambil_data['id_kategori'] : 'N/A'; ?> </td>
                                <td> <?php echo isset($ambil_data['nama_kategori']) ? $ambil_data['nama_kategori'] : 'N/A'; ?> </td>
                                <td>
                                    <a href="edit_kategori.php?id=<?php echo isset($ambil_data['id_kategori']) ? $ambil_data['id_kategori'] : '#'; ?>" class="btn btn-warning">Edit</a>
                                    <a href="hapus_kategori.php?id=<?php echo isset($ambil_data['id_kategori']) ? $ambil_data['id_kategori'] : '#'; ?>" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            <?php
                                 }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

<script>
// Fungsi untuk menghilangkan alert
function removeAlert() {
    var alert = document.getElementById('successAlert');
    if (alert) {
        alert.style.transition = 'opacity 0.5s';
        alert.style.opacity = '0';
        setTimeout(function() {
            alert.remove();
        }, 500);
    }
}

// Jalankan fungsi setelah 3 detik
setTimeout(removeAlert, 1000);
</script>

<?php
    include "footer.html";
?>
