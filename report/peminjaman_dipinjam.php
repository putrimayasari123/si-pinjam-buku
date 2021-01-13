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
        ?>

        <div class="container">
            <div class='row'>
                <div class="col-sm-12">
                    <!--dalam tabel--->
                    <div class="text-center">
                        <h2>Sistem Informasi Peminjaman Buku Perpustakaan </h2>
                        <h4>Jl. Imam Bonjol, Teladan, Kisaran Timur, <br> Kabupaten Asahan, Sumatera Utara, 21211</h4>
                        <hr>
                        <h3>DATA PEMINJAMAN BUKU SEDANG DIPINJAM</h3>
                        <table id="dtskripsi" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th><center>No.</center></th>
                                    <th><center>Peminjam</center></th>
                                    <th><center>Buku</center></th>
                                    <th><center>Tanggal Pinjam</center></th>
                                    <th><center>Tanggal Kembali</center></th>
                                    <th><center>Lama Pinjaman</center></th>
                                    <th><center>Status</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--ambil data dari database, dan tampilkan kedalam tabel-->
                                <?php
                                //buat sql untuk tampilan data, gunakan kata kunci select
                                $sql = "SELECT * FROM pinjam JOIN anggota ON pinjam.id_anggota=anggota.id_anggota JOIN buku ON pinjam.id_buku=buku.id_buku WHERE status_pinjam='Sedang dipinjam'";
                                $query = mysqli_query($koneksi, $sql) or die("SQL Anda Salah");
                                //Baca hasil query dari databse, gunakan perulangan untuk
                                //Menampilkan data lebh dari satu. disini akan digunakan
                                //while dan fungdi mysqli_fecth_array
                                //Membuat variabel untuk menampilkan nomor urut
                                $nomor = 0;
                                //Melakukan perulangan u/menampilkan data
                                while ($data = mysqli_fetch_array($query)) {
                                    $nomor++; //Penambahan satu untuk nilai var nomor
                                    $lama = date_diff(date_create($data['tgl_pinjam']), date_create($data['tgl_kembali'])); 
                                    ?>
                                    <tr>
                                        <td><?= $nomor ?></td>
                                        <td><?= $data['nama'] ?></td>
                                        <td><?= $data['judul'] ?></td>
                                        <td><?= date('d-m-Y', strtotime($data['tgl_pinjam'])) ?></td>
                                        <td><?= date('d-m-Y', strtotime($data['tgl_kembali'])) ?></td>
                                        <td><?= $lama->days ?> Hari</td>
                                        <td><?= $data['status_pinjam'] ?></td>
                                    </tr>
                                    <!--Tutup Perulangan data-->
                                <?php } ?>
                            </tbody>
                        </table>
                        <table class="table">
                                <tbody>
                                    <tr>
                                        <td>
                                            <table>
                                                <?php 
                                                    $sql3 = "SELECT status_pinjam FROM pinjam WHERE status_pinjam='Sedang dipinjam'";
                                                    $query3 = mysqli_query($koneksi, $sql3) or die("SQL Anda Salah");
                                                    $total1 = mysqli_num_rows($query3);

                                                    $sql4 = "SELECT status_pinjam FROM pinjam WHERE status_pinjam='Sudah dikembalikan'";
                                                    $query4 = mysqli_query($koneksi, $sql4) or die("SQL Anda Salah");
                                                    $total2 = mysqli_num_rows($query4);

                                                ?>
                                                <tr>
                                                    <th>Jumlah Dipinjam</th><td>&nbsp;  : &nbsp;</td><td> <?= $total1 ?> Buku</td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td></td>
                                        <td>
                                            <div class="text-center">
                                                Kisaran,  <?= date("d-m-Y") ?>
                                                <br><br><br><br>
                                                <u><strong>KEPALA PERPUSTAKAAN<strong></u><br>
                                                NIP. -
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>     
                        </table>
                    </div>
                </div>
            </div>
    </body>
</html>
