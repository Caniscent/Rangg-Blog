<?php
include "../koneksi.php";

if(isset($_GET['p'])) $p=$_GET['p'];
else $p='';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style.css?v=2.0">
  <link rel="shortcut icon" href="../img/unej.png">
  <title>Etika Profesi | Rangg-Blog</title>
   <!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

</head>

<body>
  <!-- nav -->
<div>

  <nav class="navbar navbar-expand-lg shadow-sm" style="background-color: #fff">
    <div class="container">
      <a class="navbar-brand" href="../index.php">Rangg-Blog</a>
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
          <a class="nav-link" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="index.php?p=admin">Insert</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasExampleLabel">About</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div class="card" style="align-items: center; text-align: center;">
      <h2>Profile</h2>
      <img src="../img/rp.jpg" alt="No IMG" width="120" class=" rounded-circle img-thumbnail">
      <p>Halo! perkenalkan, saya <strong>Rangga Pramudya Setiawan</strong> dengan NIM 232410102070. Dari prodi Teknologi Informasi, Fakultas Ilmu Komputer. Asal dari Banyuwangi.</p>
      <br><br>
      <a target="_blank" href="https://unej.ac.id">
          <h4 style="color:black;">MY UNIVERSITY</h4>
        </a>
        <a target="_blank" href="https://unej.ac.id">
          <img src="../img/unej.png" alt="NO IMG" style="width: 240px; height: 240px;">
        </a>
    </div>
    </div>
  </div>
  </nav>

<?php if(empty($p)) {?>

    <div id="page-wrapper">
        <div class="container"><br>
            <div class="row form-group">
                <h1 class="page-header">List Resume</h1>
            </div>
        </div>

    <section id="project">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#ffffff" fill-opacity="1"
        d="M0,256L48,229.3C96,203,192,149,288,138.7C384,128,480,160,576,181.3C672,203,768,213,864,197.3C960,181,1056,139,1152,106.7C1248,75,1344,53,1392,42.7L1440,32L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z">
      </path>
    </svg>

      <!-- <div class="row justify-content-center text-center mb-3">
        <div class="col">
          <h2>List Resume</h2>
        </div>
      </div> -->
      <br>
      <div class="container">
      <div class="row justify-content-center">
        <?php
        // if(isset($_GET['id'])){
        //   $id = $_GET['id'];
        //   $new = mysqli_query($koneksi, "SELECT * FROM materi WHERE id = $id");
        //   $rec = mysqli_fetch_array($new);
        // }
        $sql = mysqli_query($koneksi, "SELECT * FROM materi ORDER BY judul");
        while($rec = mysqli_fetch_array($sql)){
        ?>
        <div class="col-md-4 mb-3">
        <div class="card" style="text-align: center;">
        <a href="./isi.php?id=<?= $rec['id']?>"><img src="../img/ethic.jpg" class="card-img-top" alt="No IMG"></img></a>
            <div class="card-body">
            <h5 class="card-title" ><?= $rec['judul']?></h5>
            <p class="card-subtitle">Di Posting Pada <?= date("d M Y", $rec['time'])?></p>
            <br>
            <!-- <p class="card-text">Lihat selengkapnya...</p> -->
              <a href="./isi.php?id=<?= $rec['id']?>" class="btn btn-primary" >Lihat Selengkapnya</a>
            </div>
          </div>
        </div>
        <?php } ?> 
      </div> 
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#ffffff" fill-opacity="1"
        d="M0,128L48,106.7C96,85,192,43,288,58.7C384,75,480,149,576,160C672,171,768,117,864,112C960,107,1056,149,1152,170.7C1248,192,1344,192,1392,192L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
      </path>
    </svg>
  </section>  
  </div>


<?php }
elseif($p == 'isi') include ("isi.php");
elseif($p == 'login') include ("admin/login.php");
elseif($p == 'logout') include ("admin/logout.php");
elseif($p == 'admin') include ("admin/index.php");
?>
  <!-- footer -->
<footer class="footer">
<div class="container bottom_border">
<div class="row">
<div class=" col-sm-4 col-md col-sm-4  col-12 col">
<h5 class="headin5_amrc col_white_amrc pt2">About</h5>
<!--headin5_amrc-->
<p class="mb10">Tujuan Blog ini dibuat adalah untuk men-resume materi materi dari mata kuliah saya di Universitas Jember. Untuk saat ini hanya ada matkul Etika Profesi.</p>
<!-- <p><i class="fa fa-location-arrow"></i> 9878/25 sec 9 rohini 35 </p>
<p><i class="fa fa-phone"></i>  +91-9999878398  </p>
<p><i class="fa fa fa-envelope"></i> info@example.com  </p> -->
</div>


<div class=" col-sm-4 col-md  col-6 col">
<h5 class="headin5_amrc col_white_amrc pt2">Follow My University</h5>
<!--headin5_amrc-->
<ul class="footer_ul_amrc">
<li><a href="https://www.facebook.com/unejofficial/?locale=id_ID" target="_blank">Facebook</a></li>
<li><a href="https://www.instagram.com/univ_jember/?hl=en" target="_blank">Instagram</a></li>
<li><a href="https://twitter.com/univ_jember?lang=en" target="_blank">Twitter</a></li>
<li><a href="https://www.linkedin.com/company/universitasjember/" target="_blank">LinkedIn</a></li>
<li><a href="https://www.youtube.com/c/UNEJOfficial" target="_blank">Youtube</a></li>
</ul>
<!--footer_ul_amrc ends here-->
</div>

<div class=" col-sm-4 col-md  col-6 col">
<h5 class="headin5_amrc col_white_amrc pt2">Follow My Faculty</h5>
<!--headin5_amrc-->
<ul class="footer_ul_amrc">
<li><a href="https://www.instagram.com/fasilkomunej/?hl=en" target="_blank">Instagram</a></li>
</ul>
<!--footer_ul_amrc ends here-->
</div>


<div class=" col-sm-4 col-md  col-12 col">
<h5 class="headin5_amrc col_white_amrc pt2">Follow Me</h5>
<!--headin5_amrc ends here-->

<ul class="footer_ul2_amrc">
<li><a href="https://www.facebook.com/rangga.pramudya.s/"><i class="fab fa-facebook-f fleft padding-right"></i></a><p>My social media<br><a href="https://www.facebook.com/rangga.pramudya.s/" target="_blank">Click to see more...</a></p></li>
<li><a href="https://www.instagram.com/ranggapramudya_23/"><i class="fab fa-instagram fleft padding-right"></i> </a><p>My social media<br><a href="https://www.instagram.com/ranggapramudya_23/" target="_blank">Click to see more...</a></p></li>
</ul>
<!--footer_ul2_amrc ends here-->
</div>
</div>
</div>

<div class="container">
<ul class="foote_bottom_ul_amrc">
<li><a href="#">Home</a></li>
<li><a href="#">About</a></li>
<li><a href="https://unej.ac.id" target="_blank">My University</a></li>
</ul>
<!--foote_bottom_ul_amrc ends here-->
<p class="text-center">Copyright &copy;2023 | Designed by <a href="#">Rangg</a></p>

<!-- <ul class="social_footer_ul">
<li><a href="http://webenlance.com"><i class="fab fa-facebook-f"></i></a></li>
<li><a href="http://webenlance.com"><i class="fab fa-twitter"></i></a></li>
<li><a href="http://webenlance.com"><i class="fab fa-instagram"></i></a></li>
</ul> -->
<!--social_footer_ul ends here-->
</div>

</footer>

  <!-- <footer class="main-footer">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#ffffff" fill-opacity="1"
        d="M0,160L0,128L480,128L480,192L960,192L960,128L1440,128L1440,0L960,0L960,0L480,0L480,0L0,0L0,0Z"></path>
    </svg>
    <div class="container-fluid">
      <div style="padding: 20px; font-family: arial;">
        <p style="font-size: 20px; text-align: left;">Universitas Jember adalah institusi pendidikan tinggi yang telah mengikrarkan diri sebagai Kampus Kebangsaan dan Kampus Pancasila. Dalam menjalankan amanah menyelenggarakan pendidikan, penelitian dan pengabdian kepada masyarakat, Universitas Jember bertekad bekerja secara Profesional, Responsif, Inovatif, Milenial dan Akuntabel (PRIMA).</p>
        <p style="font-size: 20px; text-align: left;">Universitas Jember menyelenggarakan pendidikan tinggi bagi segenap anak bangsa, menjalankan penelitian di bidang IPTEKS bagi kemaslahatan ummat manusia, serta mengabdikan diri kepada masyarakat melalui berbagai inovasi guna kesejahteraan bangsa dan negara. Universitas Jember memiliki keyakinan dengan kebersamaan dan kerjasama yang harmonis maka masa depan yang gemilang akan bisa diraih. Universitas Jember, Working in Harmony, Nurturing The Future.</p>
      </div>
      <div class="text-center" style="padding: 50px; font-family: times;">
        <p style="color: black; font-size: 20px;">Copyright &copy;2023</p>
      </div>
    </div>
  </footer> -->
</div>

<a href="#" class="toparrow">Top &#8593;</a>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
    integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
    integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
    crossorigin="anonymous"></script>
</body>

</html>