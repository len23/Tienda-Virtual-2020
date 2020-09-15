<?php 
  require_once '../config/coneccion.php';
  if(isset($_SESSION['user_id'])) {
      $_SESSION['user_id'] = $_COOKIE['user_id'];
      $user_id = $_SESSION['user_id'];
      $query = "SELECT * FROM `carrito` WHERE user_id = '$user_id'";
      $data = mysqli_query($enlace, $query);
      echo '<div class="container min-vh-75">';
      while ($row = mysqli_fetch_array($data)) {  
        $carrito_id = $row['carrito_id'];
        $query_prod = 'SELECT * FROM PRODUCTO WHERE PRODUCTO_ID = "'. $row['producto_id']. '"';
        $data_prod = mysqli_query($enlace, $query_prod);
        $row_prod =  mysqli_fetch_array($data_prod);
        
        $cantidad = $row['cantidad'];
        $img_prod = $row_prod['IMAGE'];
        $descp_prod = $row_prod['DESCRIPCION'];
        $precio_prod = $row_prod['PRECIO'];
        
        include '../layouts/prods_carritos_template.php';
      }
      echo '</div>';
    }


?>