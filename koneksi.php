<?php
$server="localhost";
$username="root";
$password="";
$db="myblog";

$koneksi = mysqli_connect($server,$username,$password,$db);
if(!($koneksi)) 'koneksi gagal';
?>