<?php
include "../koneksi.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = mysqli_query($koneksi, "SELECT * FROM materi WHERE id = $id");
    $rec = mysqli_fetch_array($query);
}
$id = $_GET['id'];
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $up = "UPDATE materi SET judul = $judul, isi = $isi WHERE id = $id";
    mysqli_query($koneksi, $up);
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
    <title>Admin</title>
</head>
<body>
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
                <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" value="<?= $rec['judul']?>" required>
            </div>
            <br>
            <div class="form-group">
                <label>Isi Materi :</label>
                <textarea type="text" class="form-control" name="isi" id="isi" placeholder="Isi" value="<?= $rec['isi']?>" required></textarea>
            </div>
            <br>
            <div>
                <!-- <a type="submit" class="btn btn-secondary" href="logout.php">Logout</a> -->
                <input type="submit" name="update" class="btn btn-warning" value="Update">
                <!-- <input type="reset" name="Reset" value="Reset"> -->
            </div>
        </div>
    </form>
    <br><br>
    <!-- 
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
    </form> -->
    
    <script>CKEDITOR.replace( 'isi' );</script>
</body>
</html>