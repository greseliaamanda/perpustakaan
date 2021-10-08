<?php
include '../koneksi.php';

$id_peminjaman = $_POST['idpeminjaman'];
$id_anggota  = $_POST['id_anggota'];
$id_buku = $_POST['id_buku'];
$tgl_pinjam = date('Y-m-d',strtotime($_POST['tanggalpinjam']));
$tgl_kembali = date('Y-m-d',strtotime($_POST['tanggalkembali']));
$status = "Pinjam";

if(isset($_POST['simpan'])){
    $sql = "INSERT INTO tbtransaksi VALUES('$id_peminjaman','$id_anggota','$id_buku','$tgl_pinjam', '$tgl_kembali', '$status')";
    $query = mysqli_query($db, $sql);
}

header("location:../index.php?p=transaksi");
?>