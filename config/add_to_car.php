<?php 
  include 'coneccion.php';
  echo '<p>----------------------------</p>';
  var_dump($_GET);
  $user_id = $_GET['user_id'];
  $prod_id = $_GET['prod_id'];
  $quantity = $_GET['quantity'];

  $query = "INSERT INTO `carrito` (`carrito_id`, `user_id`, `producto_id`, `cantidad`) VALUES (NULL, '$user_id', '$prod_id', '$quantity')";
  echo $query;
  if($result = mysqli_query($enlace, $query)){
    echo '<p>To bien</p>';
  }else {
    echo '<p>Hubo un error</p>';
    var_dump(mysqli_query($enlace, $query));
  }
?>