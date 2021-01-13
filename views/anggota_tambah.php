<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Form Tambah Data Anggota</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
						<div class="form-group">
                            <label for="no_rak" class="col-sm-3 control-label">Nama Lengkap</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama" class="form-control" id="inputEmail3" placeholder="Inputkan Nama Lengkap" required>
                            </div>
                        </div>
						<div class="form-group">
                            <label for="no_laci" class="col-sm-3 control-label">Alamat Lengkap</label>
                            <div class="col-sm-9">
                                <input type="text" name="alamat" class="form-control" id="inputEmail3" placeholder="Inputkan Alamat Lengkap" required>
                            </div>
                        </div>
						<div class="form-group">
                            <label for="no_boks" class="col-sm-3 control-label">Status/Pekerjaan</label>
                            <div class="col-sm-9">
                                <input type="text" name="status" class="form-control" id="inputEmail3" placeholder="Inputkan Status/Pekerjaan" required>
                            </div>
                        </div>
						<div class="form-group">
                            <label for="para_pihak" class="col-sm-3 control-label">No Telpon</label>
                            <div class="col-sm-3">
                                <input type="text" name="no_telpon" class="form-control" id="inputEmail3" placeholder="Inputkan No Telpon" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-save"></span> Simpan Data Anggota</button>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="panel-footer">
                    <a href="?page=anggota&actions=tampil" class="btn btn-danger btn-sm">
                        Kembali Ke Data Anggota
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
if($_POST){
    //Ambil data dari form
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $status = $_POST['status'];
    $notelp = $_POST['no_telpon'];
    //buat sql
    $sql="INSERT INTO anggota VALUES ('','$nama','$alamat','$status','$notelp')";
    $query=  mysqli_query($koneksi, $sql) or die ("SQL Simpan Arsip Error");
    if ($query){
        echo "<script>window.location.assign('?page=anggota&actions=tampil');</script>";
    }else{
        echo "<script>alert('Simpan Data Gagal');<script>";
    }
}
?>
