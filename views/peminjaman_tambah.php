<?php
    setlocale(LC_ALL, 'id-ID', 'id_ID');
    $sql = "SELECT *FROM buku WHERE id_buku ='" . $_GET['id'] . "'";
    //proses query ke database
    $query = mysqli_query($koneksi, $sql) or die("SQL Detail error");
    //Merubaha data hasil query kedalam bentuk array
    $data = mysqli_fetch_array($query);
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Tambah Data Pinjaman Buku</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal row g-3" method="post">
                        <div class="col-auto">
                            <label for="no_rak" class="col-sm-3 control-label">Id Anggota</label>
                            <div class="col-sm-3">
                                <input type="number" name="id_anggota" class="form-control" id="inputEmail3" placeholder="Inputkan Id Anggota" required>
                            </div>
                        </div>
                        <div class="col-auto">
                            <button type="submit" name='post2' class="btn btn-primary col-sm-1" style="margin-top:0px">Cari</button>
                        </div>
                    </form><br>
                    <form class="form-horizontal" action="" method="post">
                        
                        <div class="form-group">
                            <label for="no_perkara" class="col-sm-3 control-label">Anggota Peminjam</label>
                            <div class="col-sm-9">
                                <?php
                                    if(isset($_POST['post2'])){
                                        if(isset($_POST['id_anggota'])){
                                            $sql2 = "SELECT * FROM anggota WHERE id_anggota ='" . $_POST['id_anggota'] . "'";
                                            //proses query ke database
                                            $query2 = mysqli_query($koneksi, $sql2) or die("SQL Detail error");
                                            //Merubaha data hasil query kedalam bentuk array
                                            $data2 = mysqli_fetch_array($query2);
                                            if (isset($data2)){
                                                $data_anggota = $data2['nama'];
                                            }else{
                                                $data_anggota = "Data tidak ditemukan!";
                                            }
                                        }
                                    }
                                ?>
								<input type="text" name="anggota"  class="form-control" id="inputEmail3" <?php if(isset($_POST['id_anggota'])) echo 'value="'.$data_anggota.'"' ?> placeholder="Anggota Peminjam" readonly="true">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="no_perkara" class="col-sm-3 control-label">Judul Buku</label>
                            <div class="col-sm-9">
								<input type="text" name="judul"  class="form-control" id="inputEmail3" value="<?= $data['judul'] ?>" placeholder="Judul Buku" readonly="true">
                            </div>
                        </div>

						<div class="form-group">
                            <label for="peminjam" class="col-sm-3 control-label">Tanggal Pinjam</label>
                            <div class="col-sm-3">
                                <input type="text" name="tgl_pinjam" class="form-control" id="inputEmail3" value="<?= strftime('%A %d %B %Y') ?>" placeholder="Tanggal Pinjam" readonly="true">
                            </div>
                        </div>

						<div class="form-group">
                            <label for="tglPinjam" class="col-sm-3 control-label">Tanggal Kembali</label>
                            <div class="col-sm-3">
                                <input type="date" name="tgl_kembali" class="form-control" id="inputEmail3" placeholder="Tanggal Kembali">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button name='post3' type="submit" class="btn btn-success">
                                    <span class="fa fa-save"></span> Simpan Data</button>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="panel-footer">
                    <a href="?page=buku&actions=tampil" class="btn btn-danger btn-sm">
                        Kembali Ke Data Buku
                    </a>
                    <a href="?page=peminjaman&actions=tampil" class="btn btn-danger btn-sm">
                        Riwayat Peminjaman
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
if(isset($_POST['post3'])){
    //Ambil data dari form
    $anggota = $_POST['anggota'];
    $judul = $_POST['judul'];
    $tglPinjam = date('Y-m-d');
    $tglkembali = $_POST['tgl_kembali'];

    $sql3 = "SELECT *FROM anggota WHERE nama ='$anggota'";
    //proses query ke database
    $query3 = mysqli_query($koneksi, $sql3) or die("SQL Detail error");
    //Merubaha data hasil query kedalam bentuk array
    $data3 = mysqli_fetch_array($query3);
    $anggota_id = $data3['id_anggota'];

    $sql4 = "SELECT *FROM buku WHERE judul ='$judul'";
    //proses query ke database
    $query4 = mysqli_query($koneksi, $sql4) or die("SQL Detail error");
    //Merubaha data hasil query kedalam bentuk array
    $data4 = mysqli_fetch_array($query4);
    $buku_id = $data4['id_buku'];

    //buat sql
    $sqlsimpan="INSERT INTO pinjam VALUES ('','$anggota_id','$buku_id','$tglPinjam','$tglkembali','Sedang dipinjam')";
    $querysimpan=  mysqli_query($koneksi, $sqlsimpan) or die ("SQL Simpan Peminjaman Error");

    $sqlbuku="UPDATE buku SET jumlah=jumlah-1 WHERE id_buku='$buku_id'";
    $querybuku=  mysqli_query($koneksi, $sqlbuku) or die ("SQL Simpan Peminjaman Error");

    if ($querysimpan){
        echo "<script>window.location.assign('?page=buku&actions=tampil');</script>";
    }else{
        echo "<script>alert('Simpan Data Gagal');<script>";
    }
}

?>
