<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Informasi Detail Arsip</h3>
                </div>
                <div class="panel-body">
                    <!--Menampilkan data detail arsip-->
                    <?php
                    $sql = "SELECT *FROM buku WHERE id_buku ='" . $_GET ['id'] . "'";
                    //proses query ke database
                    $query = mysqli_query($koneksi, $sql) or die("SQL Detail error");
                    //Merubaha data hasil query kedalam bentuk array
                    $data = mysqli_fetch_array($query);
                    ?>   

                    <!--dalam tabel--->
                    <table class="table table-bordered table-striped table-hover"> 
                        <tr>
                            <td width="200">Judul Buku</td> <td><?= $data['judul'] ?></td>
                        </tr>
                        <tr>
                            <td>Pengarang</td> <td><?= $data['pengarang'] ?></td>
                        </tr>
                        <tr>
                            <td>Penerbit</td> <td><?= $data['penerbit'] ?></td>
                        </tr>
						<tr>
                            <td>Tahun Keluaran</td> <td><?= $data['tahun'] ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah</td> <td><?= $data['jumlah'] ?></td>
                        </tr>
                    </table>
				
                </div> <!--end panel-body-->
                <!--panel footer--> 
                <div class="panel-footer">
                    <a href="?page=buku&actions=tampil" class="btn btn-success btn-sm">
                        Kembali ke Data Buku </a>
                </div>
                <!--end panel footer-->
            </div>

        </div>
    </div>
</div>

