<?php
  class ProductoDB {  
    function obtenerProductos() {
      include "coneccion.php";

      $query = "SELECT * FROM PRODUCTO";
      $result = mysqli_query($enlace,$query);
?>

    <div class="row border-bottom py-5">
      <?php
        $i=1;
        /* while ($result_ar=mysqli_fetch_assoc($result)) { */
        while ($i<=7) {
      ?>    
        <div class="col-md-4 text-center bg-white mt-3">
          <img class="w-75" src="./images/compu-1.jpg" alt="">
          <p class="description border-top border-bottom py-3">
            COP. HP AIO ProOne 400 G5 i7-9700 8GB 1TB 23.8Inc HDMI 2USB3.1 FREE DOS Black
          </p>
          <div class="info-shop d-flex justify-content-between align-items-center px-3 flex-wrap">
            <button class="btn btn-info">COMPRAR <i class="fas fa-shopping-cart"></i></button>
            <span class="price">$887.78</span>
          </div>
        </div>
      <?php
        ++$i;
      }
      ?>
    </div>
    <?php
    }
  }
?>