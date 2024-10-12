<?php
    include "header.php";
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
                        <a href="#" class="btn btn-primary">Tambah Data</a>
                    </div>
                    <div class="col">
                        <form action="" class="form-inline d-flex justify-content-end">
                        <input type="text" class="form-control" placeholder="Cari data">
                        <input type="submit" class="btn btn-primary ml-2" value="Submit">
                        </form>
                    </div>
                    </div>
                <div class="row mt-2">
                    <div class="col">
                        <table class="table table-bordered table-striped"> 
                            <tr>
                                <th> No </th>
                                <th> Kode Kategori</th>
                                <th> Nama Kategori</th>
                            </tr>
                            <tr>
                                <th> 1 </th>
                                <th> K-0001 </th>
                                <th> Komputer </th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
</div>
        </div>
    </div>
</div>
<?php
    include "footer.html";
?>

