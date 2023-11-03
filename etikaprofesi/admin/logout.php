<?php
session_start();
session_destroy();
header("location:./admin/login.php");
exit;

if(session_destroy()){
    echo"<script>alert('');
    document.location.href='index.php';
    </script>";
}else{
    echo"<script>alert('Fail delete');</script>";
}
?>