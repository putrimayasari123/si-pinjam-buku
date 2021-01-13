<?php
  include '../config/koneksi.php';
?>   
<!DOCTYPE html>
<html>
    <head>
        <title>Cetak Data Anggota</title>
        <link href="../Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body onload="print()">
        <!--Menampilkan data detail arsip-->

        <div class="container">
            <div class='row'>
                  <div class="col-sm-12">
                    <!--dalam tabel--->
                    <div class="text-center">
                        <h2>Sistem Informasi Peminjaman Buku Perpustakaan </h2>
                        <h4>Jl. Imam Bonjol, Teladan, Kisaran Timur, <br> Kabupaten Asahan, Sumatera Utara, 21211</h4>
                        <hr>
                        <h3>ARSIP DATA ANGGOTA</h3>
                        <table class="table table-bordered table-striped table-hover">
                          <thead>
                            <tr>
                              <th><center>No.</center></th>
                              <th><center>Nama</center></th>
                              <th><center>Alamat</center></th>
                              <th><center>Status/Pekerjaan</center></th>
                              <th><center>No Telpon</center></th>
                            </tr>
                          </thead>
                          <tbody>
                            <!--ambil data dari database, dan tampilkan kedalam tabel-->
                            <?php
                            //buat sql untuk tampilan data, gunakan kata kunci select
                            $sql = "SELECT * FROM anggota ORDER BY id_anggota DESC";
                            $query = mysqli_query($koneksi, $sql) or die("SQL Anda Salah");
                            //Baca hasil query dari databse, gunakan perulangan untuk
                            //Menampilkan data lebh dari satu. disini akan digunakan
                            //while dan fungdi mysqli_fecth_array
                            //Membuat variabel untuk menampilkan nomor urut
                            $nomor = 0;
                            //Melakukan perulangan u/menampilkan data
                            while ($data = mysqli_fetch_array($query)) {
                            $nomor++; //Penambahan satu untuk nilai var nomor
                            ?>
                            <tr>
                              <td><?= $nomor ?></td>
                              <td><?= $data['nama'] ?></td>
                              <td><?= $data['alamat'] ?></td>
                              <td><?= $data['status_pekerjaan'] ?></td>
                              <td><?= $data['no_telpon'] ?></td>
                            </tr>
                            <!--Tutup Perulangan data-->
                            <?php } ?>
                          </tbody>
                          <!-- <tfoot>
                              <tr>
                                <td colspan="8" class="text-right">
                                  <br>
                                  <br>
                                    Kisaran,  &nbsp <?= date("d-m-Y") ?>
                                    <br><br><br><br>
                                    <u>Kepala Perpustakaan<strong></u><br>
                                    NIP. - &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
									             </td>
								              </tr>
							            </tfoot> -->
                        </table>
                        <table class="table">
                                <tbody>
                                    <tr>
                                        <td>
                                            <table>
                                                <?php 
                                                    $sql3 = "SELECT id_anggota FROM anggota";
                                                    $query3 = mysqli_query($koneksi, $sql3) or die("SQL Anda Salah");
                                                    $total = mysqli_num_rows($query3);

                                                ?>
                                                <tr>
                                                    <th>Total Anggota</th><td>&nbsp;  : &nbsp;</td><td> <?= $total ?> Orang</td>
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
        </div>
    </body>
</html>
