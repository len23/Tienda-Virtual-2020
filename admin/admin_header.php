<?php 
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1e179ba697.js" crossorigin="anonymous"></script>

    <title>Admin ComnpuStore</title>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light px-4">
        <a class="navbar-brand" href="#">CompuStore</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            
          </ul>
          <div class="buttons_admin">
          <?php 
          if(!isset($_SESSION['username_admin']) && !isset($_COOKIE['username_admin'])){
           echo '<i class="far fa-user"></i>';
          }
          else{
            $_SESSION['username_admin'] = $_COOKIE['username_admin'];
            echo '<a class="mr-5" href="#"><i class="far fa-user"></i> '. $_SESSION['username_admin'] . '</a>';
            echo '<a href="logout_admin.php" class="btn btn-danger"> Log Out </a>';
          }
            ?>
          </div>
        </div>
      </nav>
    </header>
 

 