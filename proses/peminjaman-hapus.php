<?php
include '../koneksi.php';

$id_peminjaman = $_GET['id'];

mysqli_query($db, "DELETE FROM tbtransaksi WHERE idpeminjaman= '$id_peminjaman'") or die(mysql_error());

header("location:../index.php?p=transaksi");
?>