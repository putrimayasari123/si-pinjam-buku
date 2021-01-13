<?php
if(!isset($_SESSION ['idsesi'])) {
    echo "<script> window.location.assign('../index.php'); </script>";
}
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-user-plus"></span> Riwayat Peminjaman Buku</h3>
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
                                        <a href="?page=peminjaman&actions=detail&id=<?= $data['id_pinjam'] ?>" class="btn btn-info btn-xs">
                                            <span class="fa fa-eye"></span>
                                        </a>
                                        <a href="?page=peminjaman&actions=balik&id=<?= $data['id_pinjam'] ?>" class="btn btn-warning btn-xs">
                                            <span class="fa fa-check"></span>
                                        </a>
                                        <a href="?page=peminjaman&actions=delete&id=<?= $data['id_pinjam'] ?>" class="btn btn-danger btn-xs">
                                            <span class="fa fa-remove"></span>
                                        </a>
                                    </td>
                                </tr>
                                <!--Tutup Perulangan data-->
                            <?php } ?>
                        </tbody>

                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
