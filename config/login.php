<?php 

  $error_msg = "";
  
  //Si el usuario no esta logueado, se procederá a loguearlo
  if(!isset($_COOKIE['user_id'])){ //Revisa si no esta establecida la cookie
    if(isset($_POST['submit'])){ //Revisa si no se ha hecho el submit
        require_once('coneccion.php'); //Se conecta a la base
        var_dump($_POST);
        $user_username = mysqli_real_escape_string($enlace, trim($_POST['username']));
        $user_password = mysqli_real_escape_string($enlace, trim($_POST['password']));

        if(!empty($user_username) && !empty($user_password)) {
          //Buscamos la informacion en la base de datos
          $query = "SELECT user_id, username FROM usuario WHERE username = '$user_username' AND password = SHA('$user_password')";
          $data = mysqli_query($enlace, $query);
          var_dump(mysqli_num_rows($data));

          if(mysqli_num_rows($data) == 1) {
            //Si la extraxion de la base fue exitosa, establecemos cookies
            $row = mysqli_fetch_array($data);
            setcookie('user_id', $row['user_id']);
            setcookie('username', $row['username']);
            /* $home_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Tienda-Virtual-2020/index.php';
            header('Location:' . $home_url); */
           
          }else {
            $error_msg = 'El usuario o la contrasena no coinciden';
          }
        }
    }else {
      $error_msg = "Ingrese usuario o contrasena para ingresar";
      echo '<h2>No inreso contrasena ni usuario</h2>';
    }
  } else {
    echo '<h2>Ya estas con la cookie fffff</h2>';
    var_dump($_COOKIE);
    /* $home_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Tienda-Virtual-2020/index.php';
    header('Location:' . $home_url); */
  }

  /* if (empty($_COOKIE['user_id'])) {
    // The username/password weren't entered so send the authentication headers
    echo '<p?></p?'
  }
  
 

  // Grab the user-entered log-in data
  $user_username = mysqli_real_escape_string($enlace, trim($_SERVER['PHP_AUTH_USER']));
  $user_password =  mysqli_real_escape_string($enlace, trim($_SERVER['PHP_AUTH_PW']));

  //Look up the username and password in the database 
  $query = "SELECT user_id, username FROM usuario WHERE username = '$user_username' AND password = SHA('$user_password')";
  $data = mysqli_query($enlace, $query);
  
  if(mysqli_num_rows($data) == 1){
    // The log-in is OK so set the user ID and username variables
    $row=mysqli_fetch_array($data);
    $user_id = $row['user_id'];
    $username = $row['username'];
  }else {
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm="Mismatch"');
    exit("<h2>Mismatch</h2><p>Lo sentimos, ingrese un usuario y contraseña válidas</p>");
  }

  //Confirm the successful log-in
 /*  echo "<p class='login'>You are logged in as $user_username </p>"; */
?>