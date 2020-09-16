<?php 

  include '../config/coneccion.php';
  include '../config/start_session.php';
 
   $user_id = $_GET['user_id'];
   $t=time();
   $date = date("Y-m-d",$t);
   $query = "INSERT INTO FACTURA (`factura_id`, `user_id`, `factura_fecha`) VALUES (NULL,'$user_id', '$date')";
   
   if(mysqli_query($enlace, $query)){
    $factura_id = mysqli_insert_id($enlace);
    $nombres = $_GET['nombres'];
    $apellidos = $_GET['apellidos'];
    $cedula = $_GET['cedula'];
    $direccion = $_GET['direccion'];
    $telefono =  $_GET['telefono'];

    $query2 = "INSERT INTO `info_factura`(`info_factura_id`, `factura_id`, `Nombres`, `Apellidos`, `nro_cedula`, `direccion`, `telefono`) VALUES (NULL,'$factura_id','$nombres','$apellidos','$cedula', '$direccion','$telefono')";

    if(mysqli_query($enlace, $query2)) {
      $query3 = "SELECT * FROM `carrito` WHERE user_id = '$user_id'";
      $data = mysqli_query($enlace, $query3);
      while ($row = mysqli_fetch_array($data)) {
        $producto_id = $row['producto_id'];
        $nombres = $row['producto_id'];
        $cantidad = $row['cantidad'];
        $query4 = "SELECT `PRECIO` FROM producto WHERE PRODUCTO_ID = '$producto_id'";
        $data2 = mysqli_query($enlace,$query4);
        $row2 = mysqli_fetch_array($data2);
        $precio = $row2['PRECIO'];
        $query5 = "INSERT INTO `detalle_factura` (`detalle_id`, `producto_id`, `factura_id`, `iva`, `cantidad`, `precio`) VALUES (NULL,'$producto_id','$factura_id','12','$cantidad','$precio')";
        echo $query5;
        if(mysqli_query($enlace,$query5)) {
          $query6 = "DELETE FROM `carrito` WHERE user_id='$user_id'";
          mysqli_query($enlace,$query6);
        }
      }
    }
   }

   

  

  /*  $query_info = "INSERT INTO `info_factura`(`info_factura_id`, `factura_id`, `Nombres`, `Apellidos`, `nro_cedula`, `direccion`, `telefono`) VALUES (NULL,[value-2],[value-3],[value-4],[value-5],[value-6],[value-7])";
 */
?>