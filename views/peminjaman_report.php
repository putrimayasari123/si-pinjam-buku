<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-user-plus"></span> Laporan Peminjaman Arsip</h3>
                </div>
                <div class="panel-body">
                    <table id="dtskripsi" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Peminjam</th>
                                <th>Buku</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Lama Pinjaman</th>
                                <th>Status</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--ambil data dari database, dan tampilkan kedalam tabel-->
                            <?php
                            //buat sql untuk tampilan data, gunakan kata kunci select
                            $sql = "SELECT * FROM pinjam JOIN anggota ON pinjam.id_anggota=anggota.id_anggota JOIN buku ON pinjam.id_buku=buku.id_buku ORDER BY id_pinjam DESC";
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
                                    <td>
                                        <a href="report/peminjaman_satu.php?id=<?= $data['id_pinjam'] ?>" target="_blank" class="btn btn-info btn-xs">
                                            <span class="fa fa-print"></span>
                                        </a>
                                    </td>
                                </tr>
                                <!--Tutup Perulangan data-->
                            <?php } ?>
                        </tbody>
                    </table>
                        <tfoot>
                            <tr>
                                <td colspan="9">
                                    <a href="report/peminjaman_semua.php" target="_blank" class="btn btn-info btn-sm">
                                        <span class="fa fa_print"></span> Cetak Semua Data
                                    </a>
                                </td>
                                <td colspan="9">
                                    <a href="report/peminjaman_dipinjam.php" target="_blank" class="btn btn-info btn-sm">
                                        <span class="fa fa_print"></span> Cetak Sedang Dipinjam
                                    </a>
                                </td>
                                <td colspan="9">
                                    <a href="report/peminjaman_kembali.php" target="_blank" class="btn btn-info btn-sm">
                                        <span class="fa fa_print"></span> Cetak Sudah Dikembalikan
                                    </a>
                                </td>
                            </tr>
                        </tfoot>
                </div>
            </div>

        </div>
    </div>
</div>

<div id="cetak_perbulan" class="modalDialog">
    <div>
        <a href="#" title="Close" class="close">X</a>

        <form  target="_blank" action="report/peminjaman_perbulan.php" method="post">
        <h4>Pilih bulan </h4>
        <select name="bulan" class="form-control">
          <option value="12"> Desember </option>
          <option value="11"> November </option>
          <option value="10"> Oktober </option>
          <option value="09"> September </option>
          <option value="08"> Agustus </option>
          <option value="07"> Juli </option>
          <option value="06"> Juni </option>
          <option value="05"> Mei </option>
          <option value="04"> April </option>
          <option value="03"> Maret </option>
          <option value="02"> Februari </option>
          <option value="01"> Januari </option>
        </select>
        <h4>Pilih tahun</h4>
        <select name="tahun" class="form-control">
          <?
            for ($i=substr(date("d-m-Y"),6,4); $i > substr(date("d-m-Y"),6,4)-5; $i--) { ?>
              <option value="<?=$i?>"> <?=$i?> </option>
          <?  }
          ?>
        </select>

        <button type="submit">OK</button>
        </form>
    </div>
</div>

<div id="cetak_pertahun" class="modalDialog">
    <div>
        <a href="#" title="Close" class="close">X</a>

        <form  target="_blank" action="report/peminjaman_pertahun.php" method="post">
        <h4>Pilih tahun</h4>
        <select name="tahun" class="form-control">
          <?
            for ($i=substr(date("d-m-Y"),6,4); $i > substr(date("d-m-Y"),6,4)-5; $i--) { ?>
              <option value="<?=$i?>"> <?=$i?> </option>
          <?  }
          ?>
        </select>

        <button type="submit">OK</button>
        </form>
    </div>
</div>
