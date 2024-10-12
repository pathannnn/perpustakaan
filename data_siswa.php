<?php
include "header.php";
include "koneksi.php";

// Inisialisasi query pencarian
$search = "";
if(isset($_GET['search'])) {
    $search = mysqli_real_escape_string($koneksi, $_GET['search']);
    $query = "SELECT * FROM siswa WHERE 
              nisn LIKE '%$search%' OR 
              nama_siswa LIKE '%$search%' OR 
              jkel LIKE '%$search%' OR 
              tempat_lahir LIKE '%$search%' OR 
              tgl_lahir LIKE '%$search%' OR 
              alamat LIKE '%$search%' OR 
              no_hp LIKE '%$search%'";
} else {
    $query = "SELECT * FROM siswa";
}

$result = mysqli_query($koneksi, $query);
?>

<div class="container mt-4">
    <h2>Data Siswa</h2>
    <div class="row mb-3">
        <div class="col">
            <a href="tambah_siswa.php" class="btn btn-primary">Tambah Siswa</a>
        </div>
        <div class="col">
            <form action="" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari siswa" name="search" value="<?php echo $search; ?>">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>NISN</th>
                <th>Nama Siswa</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>No. HP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row['nisn']."</td>";
                echo "<td>".$row['nama_siswa']."</td>";
                echo "<td>".$row['jkel']."</td>";
                echo "<td>".$row['tempat_lahir']."</td>";
                echo "<td>".$row['tgl_lahir']."</td>";
                echo "<td>".$row['alamat']."</td>";
                echo "<td>".$row['no_hp']."</td>";
                echo "<td>
                        <a href='edit_siswa.php?nisn=".$row['nisn']."' class='btn btn-warning btn-sm'>Edit</a>
                        <a href='#' onclick='konfirmasiHapus(\"".$row['nisn']."\")' class='btn btn-danger btn-sm'>Hapus</a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<script>
function konfirmasiHapus(nisn) {
    if (confirm("Apakah Anda yakin ingin menghapus siswa ini?")) {
        window.location.href = 'hapus_siswa.php?nisn=' + nisn;
    }
}
</script>

<?php
include "footer.html";
?>