<?php
include "header.php";
include "koneksi.php";

if(isset($_GET['nisn'])) {
    $nisn = $_GET['nisn'];
    $query = "SELECT * FROM siswa WHERE nisn='$nisn'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);
} else {
    header("Location: data_siswa.php");
}

if(isset($_POST['submit'])) {
    $nama_siswa = $_POST['nama_siswa'];
    $jkel = $_POST['jkel'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];

    $query = "UPDATE siswa SET 
              nama_siswa='$nama_siswa', 
              jkel='$jkel', 
              tempat_lahir='$tempat_lahir', 
              tgl_lahir='$tgl_lahir', 
              alamat='$alamat', 
              no_hp='$no_hp' 
              WHERE nisn='$nisn'";
    
    if(mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data siswa berhasil diupdate!'); window.location='data_siswa.php';</script>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}
?>

<div class="container mt-4">
    <h2>Edit Siswa</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label for="nisn">NISN:</label>
            <input type="text" class="form-control" id="nisn" name="nisn" value="<?php echo $data['nisn']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="nama_siswa">Nama Siswa:</label>
            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="<?php echo $data['nama_siswa']; ?>" required>
        </div>
        <div class="form-group">
            <label for="jkel">Jenis Kelamin:</label>
            <select class="form-control" id="jkel" name="jkel" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki" <?php if($data['jkel'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                <option value="Perempuan" <?php if($data['jkel'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir:</label>
            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>" required>
        </div>
        <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir:</label>
            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?php echo $data['tgl_lahir']; ?>" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <textarea class="form-control" id="alamat" name="alamat" rows=" 3" required><?php echo $data['alamat']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="no_hp">No. HP:</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $data['no_hp']; ?>" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        <a href="data_siswa.php" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?php
include "footer.html";
?>