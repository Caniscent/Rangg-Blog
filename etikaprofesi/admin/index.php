<?php
include "../koneksi.php";
if(isset($_GET['p'])) $p=$_GET['p'];
else $p='';

if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE){
    session_start();
}
if(!(isset($_SESSION['user']))) header("location:./admin/login.php");

if(isset($_POST['save'])){
    $id = [];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $time = time();
    $sql = "INSERT INTO materi VALUES ('','$judul','$isi','$time')";
    mysqli_query($koneksi, $sql);
    if('save'){
        echo"<script>alert('Succeed');
        document.location.href='index.php';
        </script>";
    }else{
        echo"<script>alert('Failed');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css?v=2.0">
    <link rel="shortcut icon" href="../img/user.png">
    <script src="../ckeditor/ckeditor.js"></script>
    <title>Insert | Rangg-Blog</title>
    <script type="text/javascript">
		function checkAll(ele) {
			var checkboxes = document.getElementsByTagName('input');
			if (ele.checked) {
				for (var i = 0; i < checkboxes.length; i++) {
					if (checkboxes[i].type == 'checkbox') {
						checkboxes[i].checked = true;
					}
				}
			} else {
				for (var i = 0; i < checkboxes.length; i++) {
					if (checkboxes[i].type == 'checkbox') {
						checkboxes[i].checked = false;
					}
				}
			}
		}
	</script>
</head>
<body>
<!-- <nav class="navbar navbar-expand-lg shadow-sm" style="background-color: #fff">
    <div class="container">
      <a class="navbar-brand" href="#">Rangg-Blog</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="../index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="../index.php">List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="./admin/index.php">Insert</a>
          </li>
        </ul>
      </div>
    </div>
  </nav> -->
<br>
<div aria-label="breadcrumb" class="container">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php?p=logout" onclick="return confirm('Do you want to Log Out?');">Logout</a></li>
    <li class="breadcrumb-item active" aria-current="page">Admin</li>
  </ol>
</div>
<div class="container">
        <h1>Insert</h1>
    </div>
    <br>
    <form action="" method="POST">
        <div class="container">
        
            <div class="form-group">
                <label>Judul :</label>
                <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" required>
            </div>
            <br>
            <div class="form-group">
                <label>Isi Materi :</label>
                <textarea type="text" class="form-control" name="isi" id="isi" placeholder="Isi" required></textarea>
            </div>
            <br>
            <div>
                <!-- <a type="submit" class="btn btn-secondary" href="logout.php">Logout</a> -->
                <input type="submit" name="save" class="btn btn-primary" value="Save">
                <!-- <input type="reset" name="Reset" value="Reset"> -->
            </div>
        </div>
    </form>
    <br><br>
    <form action="./admin/hapus.php" method="POST" class="container" style="padding: 10px;">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Select</th>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Isi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = mysqli_query($koneksi, "SELECT * FROM materi ORDER BY id ASC");
                while($rec = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><input type="checkbox" name="pilih[]" value="<?= $rec['id'];?>"></td>
                    <td><?= $rec['id']?></td>
                    <td><?= $rec['judul']?></td>
                    <td>Untuk isi silahkan lihat di <a href="./isi.php?id=<?= $rec['id']?>">sini</a></td>
                    <!-- <td>
                        <div class="form-group">
                            <a href="index.php?p=hapus&id=<?=$rec['id']?>" class="btn btn-warning"><i class="fa fa-arrow-up">Delete</i></a>
                        </div>
                    </td> -->
                </tr>
            </tbody>
            <?php } ?>
        </table>
            <h6>
            <input type="checkbox" onchange="checkAll(this)" name="pilih[]" value="<?= $rec['id']; ?>"> Select All
            </h6>
		    <br>
			<input type="submit" class="btn btn-danger" name="hapus" onclick="return confirm('Do you want to delete?');" value="Delete">
            <br>
    </form>
    
    <script>CKEDITOR.replace( 'isi' );</script>
</body>
</html>