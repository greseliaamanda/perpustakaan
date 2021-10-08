<?php 
    include '../koneksi.php';

    $id_peminjaman = $_POST['id_peminjaman'];
    $id_anggota  = $_POST['id_anggota'];
    $id_buku = $_POST['id_buku'];
    $tgl_pinjam = date('Y-m-d',strtotime($_POST['tanggalpinjam']));
    $tgl_kembali = date('Y-m-d',strtotime($_POST['tanggalkembali']));
    $status = "Kembali";

    if (isset($_POST['simpan'])) {

        mysqli_query($db, "UPDATE tbtransaksi
                            SET idanggota='$id_anggota', idbuku='$id_buku', tanggalpinjam='$tgl_pinjam', tanggalkembali='$tgl_kembali', status='$status'
                            WHERE idpeminjaman = '$id_peminjaman'");

        header("location:../index.php?p=transaksi");
    }
?>