<?php 
  include '../config/coneccion.php';
  include 'variables_admin.php';
  
   $category_product = mysqli_real_escape_string($enlace,trim($_POST['category_product']));
   $descp_product = mysqli_real_escape_string($enlace,trim($_POST['descp_prod']));
   $price_product = mysqli_real_escape_string($enlace,trim($_POST['prec_prod']));

   /* Para Imagen */
   $target_dir_url = $images;
   $target_dir_local = '../images/';
   $target_file_url = $target_dir_url . basename($_FILES["uploadImage"]["name"]);
   $target_file_local = $target_dir_local . basename($_FILES["uploadImage"]["name"]);
   /* Sube la imagen al servidor */
   move_uploaded_file($_FILES["uploadImage"]["tmp_name"], $target_file_local);
   /* La ruta para guardar en la base */
   $img_product = $target_file_url;

  if(!empty($category_product) && !empty($descp_product) && !empty($price_product) && !empty($img_product)) {
    $query = "INSERT INTO `producto` (`PRODUCTO_ID`, `CATEGORY`, `DESCRIPCION`, `IMAGE`, `PRECIO`) VALUES (NULL, '$category_product', '$descp_product', '$img_product', '$price_product')";
  
    $data = mysqli_query($enlace, $query);

    $admin_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Tienda-Virtual-2020/admin?message="Producto Ingresado con exito"';
    header('Location:' . $admin_url);
  }
  
  
?>
