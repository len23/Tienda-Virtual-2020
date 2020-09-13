<?php 
  include '../config/coneccion.php';
  
   $category_product = mysqli_real_escape_string($enlace,trim($_POST['category_product']));
   $descp_product = mysqli_real_escape_string($enlace,trim($_POST['descp_prod']));
   $price_product = mysqli_real_escape_string($enlace,trim($_POST['prec_prod']));
   $img_product = './images/compu-3.jpg';


  $query = "INSERT INTO `producto` (`PRODUCTO_ID`, `CATEGORY`, `DESCRIPCION`, `IMAGE`, `PRECIO`) VALUES (NULL, '$category_product', '$descp_product', '$img_product', '$price_product')";
  
  $data = mysqli_query($enlace, $query);

  $admin_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Tienda-Virtual-2020/admin';
  header('Location:' . $admin_url);
  
?>
