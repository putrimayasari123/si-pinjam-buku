<?php
  include '../config/koneksi.php';
?>   
<!DOCTYPE html>
<html>
    <head>
        <title>Cetak Data Buku</title>
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
                        <h3>ARSIP DATA BUKU</h3>
                        <table class="table table-bordered table-striped table-hover">
                          <thead>
                            <tr>
                              <th><center>No.</center></th>
                              <th><center>Judul buku</center></th>
                              <th><center>Pengarang</center></th>
                              <th><center>Penerbit</center></th>
                              <th><center>Tahun</center></th>
                              <th><center>Jumlah</center></th>
                            </tr>
                          </thead>
                          <tbody>
                            <!--ambil data dari database, dan tampilkan kedalam tabel-->
                            <?php
                            //buat sql untuk tampilan data, gunakan kata kunci select
                            $sql = "SELECT * FROM buku ORDER BY id_buku DESC";
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
                              <td><?= $data['judul'] ?></td>
                              <td><?= $data['pengarang'] ?></td>
                              <td><?= $data['penerbit'] ?></td>
                              <td><?= $data['tahun'] ?></td>
                              <td><?= $data['jumlah'] ?></td>
                            </tr>
                            <!--Tutup Perulangan data-->
                            <?php } ?>
                          </tbody>
                          <tfoot>
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
							            </tfoot>
                        </table>
                    </div>
                  </div>
            </div>
        </div>
    </body>
</html>
