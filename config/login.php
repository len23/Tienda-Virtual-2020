<?php 

  $error_msg = "";
  
  //Si el usuario no esta logueado, se procederá a loguearlo
  if(!isset($_COOKIE['user_id'])){ //Revisa si no esta establecida la cookie
    if(isset($_POST['submit'])){ //Revisa si no se ha hecho el submit
        require_once('coneccion.php'); //Se conecta a la base
        $user_username = mysqli_real_escape_string($enlace, trim($_POST['username']));
        $user_password = mysqli_real_escape_string($enlace, trim($_POST['password']));

        if(!empty($user_username) && !empty($user_password)) {
          //Buscamos la informacion en la base de datos
          $query = "SELECT user_id, username, names FROM usuario WHERE username = '$user_username' AND password = SHA('$user_password')";
          $data = mysqli_query($enlace, $query);
          if(mysqli_num_rows($data) == 1) {
            //Si la extraxion de la base fue exitosa, establecemos cookies
            $row = mysqli_fetch_array($data);
            setcookie('user_id', $row['user_id'],time() + (60 * 60 * 24 * 30));
            setcookie('username', $row['names'],time() + (60 * 60 * 24 * 30));
            $home_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Tienda-Virtual-2020/index.php';
            header('Location:' . $home_url);
           
          }else {
            $error_msg = 'El usuario o la contrasena no coinciden';
            $message_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Tienda-Virtual-2020/components/login_incorrect.php';
            header('Location:' . $message_url);
          }
        }
    }else {
      $error_msg = "Ingrese usuario o contrasena para ingresar";
    }
  }
?>