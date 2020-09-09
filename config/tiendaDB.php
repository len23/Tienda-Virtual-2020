<?php
  class ProductoDB {  
    function obtenerProductos() {
      include "coneccion.php";

      $query = "SELECT * FROM PRODUCTO";
      
      if(!$result = mysqli_query($enlace,$query)){
        echo '<p>Hubo un error</p>';
      }
      /* var_dump(mysqli_fetch_array($result, MYSQLI_ASSOC)); */
?>

    <div class="row border-bottom py-5">
      <?php
        $i=1;
        /* while ($result_ar=mysqli_fetch_assoc($result)) { */
        while ($result_ar = mysqli_fetch_assoc ($result)) {
      ?>    
        <div class="col-md-4 text-center bg-white mt-3 border-right border-left pb-3">
          <img class="w-75" src="<?php echo $result_ar['IMAGE']?>" alt="">
          <p class="description border-top border-bottom py-3">
            <?php echo $result_ar['DESCRIPCION']?>
          </p>
          <div class="info-shop d-flex justify-content-between align-items-center px-3 flex-wrap">
            <button class="btn btn-info">COMPRAR <i class="fas fa-shopping-cart"></i></button>
            <span class="price">$<?php echo $result_ar['PRECIO']?></span>
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