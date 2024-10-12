<?php
include "header.php";
include "koneksi.php";

// Cek apakah ada parameter id
if(isset($_GET['id'])) {
    $id_peminjaman = $_GET['id'];
    
    // Query untuk mengambil data peminjaman berdasarkan id
    $query = "SELECT * FROM peminjaman WHERE id_peminjaman = $id_peminjaman";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);

    if (!$data) {
        echo "<script>alert('Data peminjaman tidak ditemukan.'); window.location='data_peminjaman.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('ID peminjaman tidak diberikan.'); window.location='data_peminjaman.php';</script>";
    exit;
}

// Proses update data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nisn = $_POST['nisn'];
    $id_buku = $_POST['id_buku'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_tempo = $_POST['tgl_tempo'];
    $id_admin = $_POST['id_admin'];
    $status_pinjam = $_POST['status_pinjam'];

    $update_query = "UPDATE peminjaman SET 
                     nisn = '$nisn',
                     id_buku = '$id_buku',
                     tgl_pinjam = '$tgl_pinjam',
                     tgl_tempo = '$tgl_tempo',
                     id_admin = '$id_admin',
                     status_pinjam = '$status_pinjam'
                     WHERE id_peminjaman = $id_peminjaman";

    if (mysqli_query($koneksi, $update_query)) {
        echo "<script>alert('Data peminjaman berhasil diupdate!'); window.location='data_peminjaman.php';</script>";
    } else {
        echo "Error: " . $update_query . "<br>" . mysqli_error($koneksi);
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
    <h2>Edit Peminjaman</h2>
    <form action="" method="post">
        <div class="form-group">
            <label for="nisn">NISN:</label>
            <select class="form-control" id="nisn" name="nisn" required>
                <?php
                while ($row = mysqli_fetch_assoc($result_siswa)) {
                    $selected = ($row['nisn'] == $data['nisn']) ? 'selected' : '';
                    echo "<option value='" . $row['nisn'] . "' $selected>" . $row['nisn'] . " - " . $row['nama_siswa'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="id_buku">ID Buku:</label>
            <select class="form-control" id="id_buku" name="id_buku" required>
                <?php
                while ($row = mysqli_fetch_assoc($result_buku)) {
                    $selected = ($row['id_buku'] == $data['id_buku']) ? 'selected' : '';
                    echo "<option value='" . $row['id_buku'] . "' $selected>" . $row['id_buku'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="tgl_pinjam">Tanggal Pinjam:</label>
            <input type="date" class="form-control" id="tgl_pinjam" name="tgl_pinjam" value="<?php echo $data['tgl_pinjam']; ?>" required>
        </div>
        <div class="form-group">
            <label for="tgl_tempo">Tanggal Tempo:</label>
            <input type="date" class="form-control" id="tgl_tempo" name="tgl_tempo" value="<?php echo $data['tgl_tempo']; ?>" required>
        </div>
        <div class="form-group">
            <label for="id_admin">ID Admin:</label>
            <select class="form-control" id="id_admin" name="id_admin" required>
                <?php
                while ($row = mysqli_fetch_assoc($result_admin)) {
                    $selected = ($row['id_admin'] == $data['id_admin']) ? 'selected' : '';
                    echo "<option value='" . $row['id_admin'] . "' $selected>" . $row['id_admin'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="status_pinjam">Status Pinjam:</label>
            <select class="form-control" id="status_pinjam" name="status_pinjam" required>
                <option value="Dipinjam" <?php echo ($data['status_pinjam'] == 'Dipinjam') ? 'selected' : ''; ?>>Dipinjam</option>
                <option value="Dikembalikan" <?php echo ($data['status_pinjam'] == 'Dikembalikan') ? 'selected' : ''; ?>>Dikembalikan</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<?php
include "footer.html";
?>