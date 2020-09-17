<?php 
  require_once 'coneccion.php';
  include '../components/general_header.php';
    $email = mysqli_real_escape_string($enlace,trim($_POST['Email']));
    $names = mysqli_real_escape_string($enlace,trim($_POST['Names']));
    $password1 = mysqli_real_escape_string($enlace,trim($_POST['Password']));
    $password2 = mysqli_real_escape_string($enlace,trim($_POST['Second_Password']));

    $mensaje='';
    $home_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Tienda-Virtual-2020/index.php';

    if(!empty($email) && !empty($password1) && !empty($password2) && ( $password1 == $password2 )){
      //Revisando que no haya alguien que esté registrado con ese email

      $query = "SELECT * FROM usuario WHERE username = '$email'";
      $data = mysqli_query($enlace, $query);

      if(mysqli_num_rows($data) == 0) {
        $query = "INSERT INTO `usuario` (`user_id`, `password`, `username`, `names`,`Role`) VALUES (NULL, SHA('$password1'), '$email','$names', 'customer')";
        mysqli_query($enlace, $query);
      ?>
        <div class="container mt-5 text-center user_exists border py-4">
        <h2 class="text-success">Felicidades has sido registrado exitosamente!!</h2>
        <p class="user_exists-info">Vulve a la página de inicio para iniciar sesión</p>
        <a class="btn btn-primary btn-lg" href="<?php echo $home_url?>">Regresar</a>
      </div>
      </body>
      </html>
      <?php
      }else {
      ?>
      <div class="container mt-5 text-center user_exists border py-4">
        <h2 class="text-danger">Un usuario con ese correo ya existe.</h2>
        <p class="user_exists-info">Porfavor vuelvalo a intentar</p>
        <a class="btn btn-primary btn-lg" href="<?php echo $home_url?>">Regresar</a>
      </div>
      </body>
      </html>
      <?php
      }
  } else {
    ?>
    <div class="container mt-5 text-center user_exists border py-4">
        <h2 class="text-danger">Sus contraseñas no coinsiden!!</h2>
        <p class="user_exists-info">Porfavor vuelvalo a intentar</p>
        <a class="btn btn-primary btn-lg" href="<?php echo $home_url?>">Regresar</a>
      </div>
      </body>
      </html>
  <?php
  }
?>
