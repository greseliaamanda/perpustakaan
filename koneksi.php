<?php

$server = "db";
$user = "MYSQL_USER";
$password = "MYSQL_PASSWORD";
$nama_database = "MYSQL_DATABASE";

$db = mysqli_connect($server, $user, $password, $nama_database);

if( !$db ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

?>
