<?php 
  require_once 'coneccion.php';
    $email = mysqli_real_escape_string($enlace,trim($_POST['Email']));
    $password1 = mysqli_real_escape_string($enlace,trim($_POST['Password']));
    $password2 = mysqli_real_escape_string($enlace,trim($_POST['Second_Password']));

    $mensaje='';

    if(!empty($username) && !empty($password1) && !empty($password2) && ( $password1 == $password2 )){
      //Revisando que no haya alguien que esté registrado con ese email

      $query = "SELECT * FROM usuario WHERE username = '$email'";
      $data = mysqli_query($enlace, $query);
      if(mysqli_num_rows($data) == 0) {
        $query = "INSERT INTO `usuario` (`user_id`, `ci`, `password`, `username`, `USUARIO_ESTADO`, `USUARIO_FECHAINGRES`) VALUES (NULL, '0401485370', SHA('$password1'), '$email', NULL, NULL)";
        mysqli_query($enlace, $query);
      }else {
        $mensaje = 'El usuario ya se encuentra registrado';
      }
  }
?>
