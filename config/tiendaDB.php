<?php
  class ProductoDB {  
    function obtenerProductos() {
      include "coneccion.php";

      $query = "SELECT * FROM PRODUCTO";
      

      if(isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $query_carrito = "SELECT DISTINCT producto_id FROM `carrito` WHERE user_id='$user_id'";
        $result_prod = mysqli_query($enlace, $query_carrito);
        $prod_ids = array();
       
        while ( $result_ar_prod = mysqli_fetch_assoc ($result_prod)) {
          array_push($prod_ids,$result_ar_prod['producto_id']);
        }
      }
      
      if(!$result = mysqli_query($enlace,$query)){
        echo '<p>Hubo un error</p>';
      }
      $result =  mysqli_query($enlace,$query);
?>


    <div id="produstStore" class="row border-bottom py-5">
      <?php
        while ($result_ar = mysqli_fetch_assoc ($result)) {
           include './layouts/modal-carrito.php'
       ?>      
 
        <div class="col-md-4 text-center bg-white mt-3 border-right border-left pb-3">
          <img class="w-75" src="<?php echo $result_ar['IMAGE']?>" alt="">
          <p class="description border-top border-bottom py-3">
            <?php echo $result_ar['DESCRIPCION']?>
          </p>
          <div class="info-shop d-flex justify-content-between align-items-center px-3 flex-wrap">
          <?php 
          /* var_dump($prod_ids); */
          /* var_dump($result_ar['PRODUCTO_ID']); */
            
          if(array_search($result_ar['PRODUCTO_ID'],$prod_ids) === false){?>
          <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#productDetail<?php echo $result_ar['PRODUCTO_ID']?>">COMPRAR <i class="fas fa-shopping-cart"></i></button>
          <?php } else { ?>
          <a href="<?php echo $carrito_page?>" type="button" class="btn btn-warning">Ir al carrito <i class="fas fa-shopping-cart"></i></a>
          <?php } ?>
            <span class="price">$<?php echo $result_ar['PRECIO']?></span> 
          </div>
        </div>
      <?php
      }
      ?>
    </div>
    <?php
    }
  }
?>