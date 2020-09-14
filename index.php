<?php 
  include './config/variables.php';
  include './config/start_session.php';
  include './components/general_header.php';
  include './config/tiendaDB.php';
?>
  <header>
   <?php include './components/header.php';?>
   <?php include './layouts/banner.php';?>
 
  </header>
  <main class="bg-light">
  <?php include './layouts/modal-carrito.php';
        include './layouts/modal-login.php';
        include './layouts/modal-submit.php';
  ?>  

   <section id="products" class="productos-section container">
      <?php 
        $productsObj = new ProductoDB();
        $productsObj->obtenerProductos();
      ?>
    </section>
  </main>
  <?php include './components/footer.php'; ?>
 