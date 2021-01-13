<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Informasi Detail Peminjaman Buku</h3>
                </div>
                <div class="panel-body">
                    <!--Menampilkan data detail arsip-->
                    <?php
                    setlocale(LC_ALL, 'id-ID', 'id_ID');
                    $sql = "SELECT *FROM pinjam JOIN anggota ON pinjam.id_anggota=anggota.id_anggota JOIN buku ON pinjam.id_buku=buku.id_buku WHERE id_pinjam ='" . $_GET ['id'] . "' ORDER BY id_pinjam DESC";
                    //proses query ke database
                    $query = mysqli_query($koneksi, $sql) or die("SQL Detail error");
                    //Merubaha data hasil query kedalam bentuk array
                    $data = mysqli_fetch_array($query);
                    $lama = date_diff(date_create($data['tgl_pinjam']), date_create($data['tgl_kembali']));
                    ?>   

                    <!--dalam tabel--->
                    <table class="table table-bordered table-striped table-hover"> 
                        <tr>
                            <td width="200">No Peminjaman</td> <td><?= $data['id_pinjam'] ?></td>
                        </tr>
                        <tr>
                            <td>Anggota Peminjam</td> <td><?= $data['nama'] ?></td>
                        </tr>
                        <tr>
                            <td>Judul Buku</td> <td><?= $data['judul'] ?></td>
                        </tr>
						<tr>
                            <td>Tanggal Pijam</td> <td><?= strftime('%A %d %B %Y', strtotime($data['tgl_pinjam'])) ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Kembali</td> <td><?= strftime('%A %d %B %Y', strtotime($data['tgl_kembali'])) ?></td>
                        </tr>
                        <tr>
                            <td>Lama Pinjam</td> <td><?= $lama->days ?> Hari</td>
                        </tr>
						<tr>
                            <td>Status Peminjaman</td> <td><?= $data['status_pinjam'] ?></td>
                        </tr>
                    </table>
				
                </div> <!--end panel-body-->
                <!--panel footer--> 
                <div class="panel-footer">
                    <a href="?page=peminjaman&actions=tampil" class="btn btn-success btn-sm">
                        Kembali ke Data Peminjaman Buku</a>
                </div>
                <!--end panel footer-->
            </div>

        </div>
    </div>
</div>

