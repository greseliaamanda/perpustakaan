<?php
// include '../koneksi.php';

$query = "SELECT * FROM tbanggota";

$hasil = mysqli_query($db, $query);
mysqli_connect_error();
// ... menampung semua data kategori
$data_anggota = array();

// ... tiap baris dari hasil query dikumpulkan ke $data_anggota
while ($row = mysqli_fetch_assoc($hasil)) {
    $data_anggota[] = $row;
}
?>