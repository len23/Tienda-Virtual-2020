<?php 
  include './config/variables.php';
  include './components/general_header.php';
  include './config/login.php';
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
  <footer class="bg-dark text-center py-3">
    <?php include './components/footer.php'; ?>
  </footer>
</body>
</html>











  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
    crossorigin="anonymous"></script>
</body>

</html>