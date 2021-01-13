<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Form Tambah Data Arsip</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
						<div class="form-group">
                            <label for="no_rak" class="col-sm-3 control-label">Judul Buku</label>
                            <div class="col-sm-9">
                                <input type="text" name="judul" class="form-control" id="inputEmail3" placeholder="Inputkan Judul Buku" required>
                            </div>
                        </div>
						<div class="form-group">
                            <label for="no_laci" class="col-sm-3 control-label">Pengarang</label>
                            <div class="col-sm-9">
                                <input type="text" name="pengarang" class="form-control" id="inputEmail3" placeholder="Inputkan Pengarang Buku" required>
                            </div>
                        </div>
						<div class="form-group">
                            <label for="no_boks" class="col-sm-3 control-label">Penerbit</label>
                            <div class="col-sm-9">
                                <input type="text" name="penerbit" class="form-control" id="inputEmail3" placeholder="Inputkan Penerbit Buku" required>
                            </div>
                        </div>
						<div class="form-group">
                            <label for="para_pihak" class="col-sm-3 control-label">Tahun</label>
                            <div class="col-sm-3">
                                <input type="number" name="tahun" class="form-control" id="inputEmail3" placeholder="Inputkan Tahun Keluaran" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="no_perkara" class="col-sm-3 control-label">Jumlah Buku</label>
                            <div class="col-sm-3">
                                <input type="number" name="jumlah"class="form-control" id="inputEmail3" placeholder="Inputkan Jumlah Buku" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-save"></span> Simpan Buku</button>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="panel-footer">
                    <a href="?page=buku&actions=tampil" class="btn btn-danger btn-sm">
                        Kembali Ke Data Buku
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
if($_POST){
    //Ambil data dari form
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun'];
    $jumlah = $_POST['jumlah'];
    //buat sql
    $sql="INSERT INTO buku VALUES ('','$judul','$pengarang','$penerbit','$tahun','$jumlah')";
    $query=  mysqli_query($koneksi, $sql) or die ("SQL Simpan Arsip Error");
    if ($query){
        echo "<script>window.location.assign('?page=buku&actions=tampil');</script>";
    }else{
        echo "<script>alert('Simpan Data Gagal');<script>";
    }
}
?>
