    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
      <a class="navbar-brand text-white font-weight-bold" href="#">CompuStore</a>
      <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link text-white" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Productos</a>
          </li>
        </ul>
        <div class="buttons-cont">
          <!-- Revisamos las cookies -->
          <?php 
            if(isset($_COOKIE['username'])){

          ?>
          <a href="#" class="buttons-cont_user"><i class="far fa-user"></i> <?php echo $_COOKIE['username']?></a>
          <button class="btn btn-danger">Log Out</button>
          <button class="btn btn-info">Carrito</button>
        </div>
          <?php   
            }else {
          ?>
          <div class="buttons-cont">
            <button class="btn btn-light mr-3" data-toggle="modal" data-target="#exampleModal">Login</button>
            <button class="btn btn-info">Carrito</button>
          </div>
          <?php    
            }
          ?>

        
       
      </div>
    </nav>
    <div class="banner-header d-flex flex-column align-items-center justify-content-center">
      <h1 class="w-50 mx-auto text-white text-center text-uppercase main-title">Encuentra los mejores precios en laptops y accesorios en un solo lugar</h1>
      <a href="#products" type="button" class="btn btn-dark font-weight-bold mt-5">COMPRA YA! <i class="fas fa-arrow-down"></i></a>
    </div>
 