<?php
    include "header.php";
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 mt-4">
            <div class="card">
                <div class="card-header text-center">
                    <h5>Tambah Data</h5>
                </div>
                <div class="card-body">
                    <div class="col">
                        <form action="simpan_kategori.php" method="POST">
                            <div class="form-group">
                                <label for=""> Nama Kategori </label>
                                <input type="text" class="form-control mt-2" placeholder="Nama Kategori" name="nama_kategori">
                            </div>
                            <input type="submit" class="btn btn-primary mt-2" value="Simpan">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include "footer.html";
?>
