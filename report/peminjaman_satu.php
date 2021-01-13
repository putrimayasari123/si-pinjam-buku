<!DOCTYPE html>
<html>
    <head>
        <title>Cetak Data Peminjaman Buku</title>
        <link href="../Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body onload="print()">
        <!--Menampilkan data detail arsip-->
        <?php
        include '../config/koneksi.php';
        $sql = "SELECT * FROM pinjam JOIN anggota ON pinjam.id_anggota=anggota.id_anggota JOIN buku ON pinjam.id_buku=buku.id_buku WHERE id_pinjam='" . $_GET ['id'] . "'";
        //proses query ke database
        $query = mysqli_query($koneksi, $sql) or die("SQL Detail error");
        //Merubaha data hasil query kedalam bentuk array
        $data = mysqli_fetch_array($query);
        $lama = date_diff(date_create($data['tgl_pinjam']), date_create($data['tgl_kembali']));
        ?>

        <div class="container">
            <div class='row'>
                <div class="col-sm-12">
                    <!--dalam tabel--->
                    <div class="text-center">
                        <h2>Sistem Informasi Peminjaman Buku Perpustakaan </h2>
                        <h4>Jl. Imam Bonjol, Teladan, Kisaran Timur, <br> Kabupaten Asahan, Sumatera Utara, 21211</h4>
                        <hr>
                        <h3>DATA PEMINJAM BUKU</h3>
                        <table class="table table-bordered table-striped table-hover">
                            <tbody>
								<tr>
                                    <td>Nomor Pinjaman</td> <td><?= $data['id_pinjam'] ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Peminjam</td> <td><?= $data['nama'] ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Pinjam</td> <td><?= $data['tgl_pinjam'] ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Kembali</td> <td><?= $data['tgl_kembali'] ?></td>
                                </tr>
								<tr>
                                    <td>Lama Pinjam</td> <td><?= $lama->days ?> Hari</td>
                                </tr>
                                <tr>
                                    <td>Status Pinjam</td> <td><?= $data['status_pinjam'] ?></td>
                                </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2" class="text-right">
                                        Kisaran,  <?= date("d-m-Y") ?>
                                        <br><br><br><br>
                                        <u><strong>KEPALA PERPUSTAKAAN<strong></u><br>
                                        NIP. -
									</td>
								</tr>
							</tfoot>
                        </table>
                    </div>
                </div>
            </div>
    </body>
</html>
