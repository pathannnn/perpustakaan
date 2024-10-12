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
                    <form action="">
                        <div class="form-group mb-3">
                            <label for="">Kode Kategori</label>
                            <input type="text"  class="form-control" placeholder="Masukkan Kode Kategori" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Nama Kategori</label>
                            <input type="text"  class="form-control" placeholder="Masukkan Nama Kategori" required>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include "footer.html";
?>
