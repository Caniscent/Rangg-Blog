<?php
session_start();
if(isset($_SESSION['user'])){
    header("location:index.php?p=admin");
    exit;
}
include "../../koneksi.php";
if(isset($_POST['user']) && isset($_POST['password'])){
    $user = $_POST['user'];
    $pass = md5($_POST['password']);
    $ceklogin = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$user' AND password = '$pass' ");
    $cek = mysqli_num_rows($ceklogin);

    if($cek == 1){
        $rec = mysqli_fetch_array($ceklogin);
        $_SESSION['user'] = $user;

        header("location:../index.php?p=admin");
    }else{
        header("location:login.php?err=1;");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="shortcut icon" href="../../img/user.png">
    <title>Admin | Rangg-Blog</title>
    <style>
	:root{
            --gradient: linear-gradient(90deg, #00FF9D 25%, #05C5FF 100%);


        }

        body{
            
            background-color: #eaeaea;
            background-image: var(--gradient);
            background-size: 300%;
            background-position: right;
            animation: gradient-animation 30s infinite alternate;
            display: flex;
        }

        @keyframes gradient-animation{
            0%{
                background-position: right;
            }
			50%{
				background-position: center;
			}
            100%{
                background-position: left;
            }
        }
	</style>
</head>
<body style="background-color: grey; height: 100%; padding:15%;">
<div class="container-fluid">
<!-- <nav aria-label="breadcrumb" class="container-fluid" style="place-self: start;">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Back</a></li>
    <li class="breadcrumb-item active" aria-current="page">Login</li>
  </ol>
</nav> -->
<br>
        <div class="row justify-content-center">  
            <div class="col-md-5">
            <span style="color: red;">
                <?php
                    if(isset($_GET['err'])){
                        $err = $_GET['err'];
                    if($err = 1) echo"Username / Password salah!";
                    }
                ?>
            </span>
            <div class="card">
                <div class="card-header" style="text-align: center;">
                    LOGIN ADMIN
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="row mb-3">
                            <label for="username" class="col-md-4 col-form-label text-md-end">Username</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="user" required autocomplete="email" autofocus> 
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" required autocomplete="current-password"> 
                            </div>
                        </div>
                        <div class="row mb-0">
							<div class="col-md-8 offset-md-4">
								<button type="submit" class="btn btn-primary">Login</button>
                                <a href="../index.php" class="btn btn-secondary">Back</a>
							</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>

</body>
</html>