<?php
$sql1 = "SELECT *FROM pinjam WHERE id_pinjam ='" . $_GET ['id'] . "'";
//proses query ke database
$query1 = mysqli_query($koneksi, $sql1) or die("SQL Detail error pinjam");
//Merubaha data hasil query kedalam bentuk array
$data1 = mysqli_fetch_array($query1);
$buku_id = $data1['id_buku'];

//membuat query untuk hapus data
$sql2="UPDATE pinjam SET status_pinjam='Sudah dikembalikan' WHERE id_pinjam ='".$_GET['id']."'";
$query2=mysqli_query($koneksi, $sql2) or die ("SQL Hapus Error update pinjam");

$sql3="UPDATE buku SET jumlah=jumlah+1 WHERE id_buku='$buku_id'";
$query3=mysqli_query($koneksi, $sql3) or die ("SQL Hapus Error buku");

if($query2){
    echo"<script> window.location.assign('?page=peminjaman&actions=tampil');</script>";
}else{
    echo"<script> alert ('Maaf !!! Data Tidak Berhasil Dihapus') window.location.assign('?page=peminjaman&actions=tampil');</scripr>";
}

