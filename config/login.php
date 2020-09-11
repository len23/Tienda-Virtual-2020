<?php 
  if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {
    // The username/password weren't entered so send the authentication headers
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm="Mismatch"');
    exit('<h3>CompuStorexvcxzc</h3><p style="margin-top:0">Lo sentimos, debe de ingresar usuario y contraseña.</p>');
  }
  
  //Connect to the database
  require_once('coneccion.php');

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