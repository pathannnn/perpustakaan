<?php
include "header.php";
include "koneksi.php";

// Inisialisasi query pencarian
$search = "";
if(isset($_GET['search'])) {
    $search = mysqli_real_escape_string($koneksi, $_GET['search']);
    $query = "SELECT * FROM admin WHERE 
              id_admin LIKE '%$search%' OR 
              nama_lengkap LIKE '%$search%' OR 
              username LIKE '%$search%'";
} else {
    $query = "SELECT * FROM admin";
}

$result = mysqli_query($koneksi, $query);
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-2">
            <div class="card">
                <div class="card-header">
                    Data Admin
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <a href="tambah_admin.php" class="btn btn-primary">Tambah Admin</a>
                        </div>
                        <div class="col-md-6">
                            <form action="" method="GET" class="form-inline float-right">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Cari admin..." value="<?php echo $search; ?>">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">Cari</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <?php
                    if(isset($_GET['status'])) {
                        if($_GET['status'] == 'success') {
                            echo "<div class='alert alert-success'>Data berhasil ditambahkan/diupdate.</div>";
                        } elseif($_GET['status'] == 'deleted') {
                            echo "<div class='alert alert-success'>Data berhasil dihapus.</div>";
                        }
                    }
                    ?>
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID Admin</th>
                                <th>Nama Lengkap</th>
                                <th>Username</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>".$row['id_admin']."</td>";
                                echo "<td>".$row['nama_lengkap']."</td>";
                                echo "<td>".$row['username']."</td>";
                                echo "<td>
                                        <a href='edit_admin.php?id=".$row['id_admin']."' class='btn btn-warning btn-sm'>Edit</a>
                                        <a href='hapus_admin.php?id=".$row['id_admin']."' class='btn btn-danger btn-sm'>Hapus</a>
                                      </td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "footer.html";
?>