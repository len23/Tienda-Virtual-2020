<?php 
  session_start();
  //Si el usuario no esta logueado, se procederá a loguearlo
  if(!isset($_SESSION['user_id_admin'])){ //Revisa si no esta establecida la cookie
     //Revisa si no se ha hecho el submit
     if(!isset($_COOKIE['user_id_admin'])){
      require_once('../config/coneccion.php'); //Se conecta a la base
        $user_username = mysqli_real_escape_string($enlace, trim($_POST['username']));
        $user_password = mysqli_real_escape_string($enlace, trim($_POST['password']));

        if(!empty($user_username) && !empty($user_password)) {
          //Buscamos la informacion en la base de datos
          $query = "SELECT user_id, username, names, Role FROM usuario WHERE username = '$user_username' AND password = SHA('$user_password') AND Role ='admin'";
          $data = mysqli_query($enlace, $query);
          if(mysqli_num_rows($data) == 1) {
            //Si la extraxion de la base fue exitosa, establecemos cookies
            $row = mysqli_fetch_array($data);
            $_SESSION['user_id_admin'] = $row['user_id'];
            $_SESSION['username_admin'] = $row['names'];
            setcookie('user_id_admon', $row['user_id'],time() + (60 * 60 * 24 * 30));
            setcookie('username_admin', $row['names'],time() + (60 * 60 * 24 * 30));
            $admin_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Tienda-Virtual-2020/admin';
            header('Location:' . $admin_url);
           
          }else {
            $error_msg = 'El usuario o la contrasena no coinciden';
            $message_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Tienda-Virtual-2020/components/login_incorrect.php';
            header('Location:' . $message_url);
          }
        }
     }else if(isset($_COOKIE['user_id_admin']) && isset($_COOKIE['username_admin'])){
      $_SESSION['user_id_admin'] = $_COOKIE['user_id_admin'];
      $_SESSION['username_admin'] = $_COOKIE['username_admin'];
     }
        
  }
?>  