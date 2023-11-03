<?php
include "../../koneksi.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $delete = mysqli_query($koneksi, "DELETE FROM materi WHERE id = $id");
    if($delete){
        echo"<script>
        alert('Deleted');
        document.location.href='../index.php?p=admin';
        </script>";
    }else{
        echo"<script>alert('Fail to delete');</script>";
    }
}

$query = $_POST['pilih'];
$jumlah_pilih = count($query);

for($x=0;$x<$jumlah_pilih;$x++){
    $hapus = mysqli_query($koneksi, "DELETE FROM materi WHERE id = '$query[$x]' ");
    if($hapus){
        echo"<script>alert('Deleted');
        document.location.href='../index.php?p=admin';
        </script>";
    }else{
        echo"<script>alert('Fail to delete');</script>";
    }
}

?>