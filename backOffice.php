<!DOCTYPE html>
<html lang="fr" dir="ltr">
<?php
session_start();
require_once('./config.php');
if(!isset($_SESSION['logged_in'])) {
  $logged_in=false;
}
else {
  $logged_in=$_SESSION['logged_in'];
}
?>
  <head>
    <meta charset="utf-8">
    <title>Back Office</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="progressBar.css">
    <link rel="stylesheet" href="backOffice.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <main id="main">
      <section id="menu" class="bg-light">
        <nav class="container navbar navbar-expand-lg bg-transparent navbar-dark">
          <a href="#menu">
            <img src="img/logo.png" alt="logo" />
          </a>
          <button class="navbar-toggler ml-auto custom-toggler" type="button" data-toggle="collapse" data-target="#header" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="row py-3 collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a class="nav-link fas fa-search fa-flip-horizontal" href="#" style="color:#00a99d;"></a></li>
              <?php
              if ($logged_in==false){
                echo '<button type="button" onclick="document.getElementById(\'id01\').style.display=\'block\'" style="width:auto;color=#363636"class="btn btn-circle not-connected"><i class="fa fa-user"></i>';
              }else{
                  echo '<button type="button" onclick="document.getElementById(\'id01\').style.display=\'block\'" style="width:auto;"class="btn btn-user btn-circle btn-profile connected"><i class="fa fa-user "></i>';
                }
              ?>
            </ul>
          </div>
        </nav>
      </section>

      <?php if ($logged_in==false){

    }else{
      echo '
      <div id="id01" class="modal">
        <div class="modal-content animate">
          <div class="imgcontainer">
            <span onclick="document.getElementById(\'id01\').style.display=\'none\'" class="close" title="Close Modal">&times;</span>
            <img src="./img/img_avatar2.png" alt="Avatar" class="avatar">
          </div>
          <div class="container">
            <a href="./index.php"><button class="button-blue-light">Back to Website</button></a>
            <a href="./logout.php"><button class="button-red-light">Logout</button></a>
          </div>
        </div>
      </div>';
    }
    ?>

      <section id="nav-backOffice">
        <span class="button-sidebar" style="font-size:30px;cursor:pointer;" onclick="openNav()">&#9776; Back Office Panel</span>
      </section>
      <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#">Articles</a>
        <a href="#">Options</a>
      </div>
      </main>


    <script src="https://kit.fontawesome.com/6fee70888d.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  <script src="scriptOffice.js" charset="utf-8"></script>
  </body>
</html>
