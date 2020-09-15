<?php 
  require_once '../config/coneccion.php';
  echo '<div class="container min-vh-75">';
  $precio_total = 0;
  if(isset($_SESSION['user_id'])) {
      $_SESSION['user_id'] = $_COOKIE['user_id'];
      $user_id = $_SESSION['user_id'];
      $query = "SELECT * FROM `carrito` WHERE user_id = '$user_id'";
      $data = mysqli_query($enlace, $query);
      
      while ($row = mysqli_fetch_array($data)) {  
        $carrito_id = $row['carrito_id'];
        $query_prod = 'SELECT * FROM PRODUCTO WHERE PRODUCTO_ID = "'. $row['producto_id']. '"';
        $data_prod = mysqli_query($enlace, $query_prod);
        $row_prod =  mysqli_fetch_array($data_prod);
        
        $cantidad = $row['cantidad'];
        $img_prod = $row_prod['IMAGE'];
        $descp_prod = $row_prod['DESCRIPCION'];
        $precio_prod = $row_prod['PRECIO'];
        
        $precio_total += $precio_prod * $cantidad;
        include '../layouts/prods_carritos_template.php';
      }
     
  }
  ?>
  <div class="total d-flex justify-content-around align-items-center mx-auto mt-3 w-75 mx-auto">
    <div class="info_payment">
      <p class="font-weight-bold total_text mr-4">Total a pagar: <span class="font-weight-normal ml-3"><?php echo $precio_total ?></span></p>
    </div>
      <button class="btn btn-success" data-toggle="modal" data-target="#modalFactura"><i class="fas fa-shopping-bag"></i> Comprar</button>
    </div>
  <?php
    include '../layouts/modal-factura.php';
    echo '</div>';
    ?>
    
