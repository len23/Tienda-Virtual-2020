<?php 
  require_once 'variables.php';
 require_once './coneccion.php';

 $carrito_id = $_GET['carrito_id'];
 $query = "DELETE FROM carrito WHERE carrito_id='$carrito_id'";
 mysqli_query($enlace, $query);
 header('Location:' . $carrito_page);
?>