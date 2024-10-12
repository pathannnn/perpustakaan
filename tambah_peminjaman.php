<?php
include "header.php";
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nisn = $_POST['nisn'];
    $id_buku = $_POST['id_buku'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_tempo = $_POST['tgl_tempo'];
    $id_admin = $_POST['id_admin'];
    $status_pinjam = $_POST['status_pinjam'];

    $query = "INSERT INTO peminjaman (nisn, id_buku, tgl_pinjam, tgl_tempo, id_admin, status_pinjam) 
              VALUES ('$nisn', '$id_buku', '$tgl_pinjam', '$tgl_tempo', '$id_admin', '$status_pinjam')";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data peminjaman berhasil ditambahkan!'); window.location='data_peminjaman.php';</script>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}

// Mengambil data siswa untuk dropdown
$query_siswa = "SELECT nisn, nama_siswa FROM siswa";
$result_siswa = mysqli_query($koneksi, $query_siswa);

// Mengambil data buku untuk dropdown
$query_buku = "SELECT id_buku FROM buku";
$result_buku = mysqli_query($koneksi, $query_buku);

// Mengambil data admin untuk dropdown
$query_admin = "SELECT id_admin FROM admin";
$result_admin = mysqli_query($koneksi, $query_admin);
?>

<div class="container mt-4">
    <h2>Tambah Peminjaman</h2>
    <form action="" method="post">
        <div class="form-group">
            <label for="nisn">NISN:</label>
            <select class="form-control" id="nisn" name="nisn" required>
                <option value="">Pilih Siswa</option>
                <?php
                while ($row = mysqli_fetch_assoc($result_siswa)) {
                    echo "<option value='" . $row['nisn'] . "'>" . $row['nisn'] . " - " . $row['nama_siswa'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="id_buku">ID Buku:</label>
            <select class="form-control" id="id_buku" name="id_buku" required>
                <option value="">Pilih Buku</option>
                <?php
                while ($row = mysqli_fetch_assoc($result_buku)) {
                    echo "<option value='" . $row['id_buku'] . "'>" . $row['id_buku'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="tgl_pinjam">Tanggal Pinjam:</label>
            <input type="date" class="form-control" id="tgl_pinjam" name="tgl_pinjam" required>
        </div>
        <div class="form-group">
            <label for="tgl_tempo">Tanggal Tempo:</label>
            <input type="date" class="form-control" id="tgl_tempo" name="tgl_tempo" required>
        </div>
        <div class="form-group">
            <label for="id_admin">ID Admin:</label>
            <select class ="form-control" id="id_admin" name="id_admin" required>
                <option value="">Pilih Admin</option>
                <?php
                while ($row = mysqli_fetch_assoc($result_admin)) {
                    echo "<option value='" . $row['id_admin'] . "'>" . $row['id_admin'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="status_pinjam">Status Pinjam:</label>
            <select class="form-control" id="status_pinjam" name="status_pinjam" required>
                <option value="">Pilih Status</option>
                <option value="Dipinjam">Dipinjam</option>
                <option value="Dikembalikan">Dikembalikan</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>

<?php
include "footer.html";
?>