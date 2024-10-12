<?php
include "header.php";
include "koneksi.php";

// Inisialisasi variabel pencarian
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Query dasar
$query = "SELECT p.*, s.nama_siswa 
          FROM peminjaman p
          JOIN siswa s ON p.nisn = s.nisn";

// Jika ada pencarian
if (!empty($search)) {
    $query .= " WHERE p.id_peminjaman LIKE '%$search%'
                OR p.nisn LIKE '%$search%'
                OR p.id_buku LIKE '%$search%'
                OR s.nama_siswa LIKE '%$search%'
                OR p.tgl_pinjam LIKE '%$search%'
                OR p.status_pinjam LIKE '%$search%'";
}

$query .= " ORDER BY p.tgl_pinjam DESC";

$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Query error: " . mysqli_error($koneksi));
}
?>

<div class="container mt-4">
    <h2>Data Peminjaman</h2>
    
    <!-- Form Pencarian -->
    <form action="" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Cari peminjaman..." name="search" value="<?php echo $search; ?>">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Cari</button>
            </div>
        </div>
    </form>
    
    <a href="tambah_peminjaman.php" class="btn btn-primary mb-3">Tambah Peminjaman</a>
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID Peminjaman</th>
                <th>NISN</th>
                <th>ID Buku</th>
                <th>Nama Siswa</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Tempo</th>
                <th>ID Admin</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>".$row['id_peminjaman']."</td>";
                    echo "<td>".$row['nisn']."</td>";
                    echo "<td>".$row['id_buku']."</td>";
                    echo "<td>".$row['nama_siswa']."</td>";
                    echo "<td>".$row['tgl_pinjam']."</td>";
                    echo "<td>".$row['tgl_tempo']."</td>";
                    echo "<td>".$row['id_admin']."</td>";
                    echo "<td>".$row['status_pinjam']."</td>";
                    echo "<td>
                            <a href='edit_peminjaman.php?id=".$row['id_peminjaman']."' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='hapus_peminjaman.php?id=".$row['id_peminjaman']."' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data peminjaman ini?\")' class='btn btn-danger btn-sm'>Hapus</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9' class='text-center'>Tidak ada data peminjaman.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php
include "footer.html";
?>