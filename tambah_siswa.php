<?php
include "header.php";
include "koneksi.php";

if(isset($_POST['submit'])) {
    $nisn = $_POST['nisn'];
    $nama_siswa = $_POST['nama_siswa'];
    $jkel = $_POST['jkel'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];

    $query = "INSERT INTO siswa (nisn, nama_siswa, jkel, tempat_lahir, tgl_lahir, alamat, no_hp) 
              VALUES ('$nisn', '$nama_siswa', '$jkel', '$tempat_lahir', '$tgl_lahir', '$alamat', '$no_hp')";
    
    if(mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data siswa berhasil ditambahkan!'); window.location='data_siswa.php';</script>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}
?>

<div class="container mt-4">
    <h2>Tambah Siswa</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label for="nisn">NISN:</label>
            <input type="text" class="form-control" id="nisn" name="nisn" required>
        </div>
        <div class="form-group">
            <label for="nama_siswa">Nama Siswa:</label>
            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" required>
        </div>
        <div class="form-group">
            <label for="jkel">Jenis Kelamin:</label>
            <select class="form-control" id="jkel" name="jkel" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir:</label>
            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
        </div>
        <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir:</label>
            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="no_hp">No. HP:</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary mt-3">Simpan</button>
        <a href="data_siswa.php" class="btn btn-secondary mt-3">Batal</a>
    </form>
</div>

<?php
include "footer.html";
?>