
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
      <a class="navbar-brand text-white font-weight-bold" href="<?php echo $home?>">CompuStore</a>
      <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link text-white" href="<?php echo $home?>">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="/Tienda-Virtual-2020/#productos">Productos</a>
          </li>
        </ul>
        <div class="buttons-cont">
          <!-- Revisamos las cookies -->
          <?php 
            /* session_start(); */
            if(isset($_SESSION['username'])){

          ?>
          <a href="#" class="buttons-cont_user"><i class="far fa-user"></i> <?php echo $_SESSION['username']?></a>
          <a href="<?php echo $log_out?>" class="btn btn-danger">Log Out</a>
          <a href="./pages/carrito.php" class="btn btn-info">Carrito</a>
        </div>
          <?php   
            }else {
          ?>
          <div class="buttons-cont">
            <button class="btn btn-light mr-3" data-toggle="modal" data-target="#exampleModal">Login</button>
            <a href="./pages/carrito.php" class="btn btn-info">Carrito</a>
          </div>
          <?php    
            }
          ?>
      </div>
    </nav>