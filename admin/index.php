<?php 
  include 'admin_header.php';
  if (!isset($_SESSION['username'])) {

?>
<div class="container w-50 mx-auto vh-100 d-flex align-items-center justify-content-center flex-column">
<h1 class="text-center mt-n5 mb-4 text-uppercase">Administrador de CompuStore</h1>
<form class="w-75" action="login_admin.php" method="post">
  <div class="form-group">
    <label for="email_admin">Email</label>
    <input type="email" class="form-control" id="email_admin" aria-describedby="emailHelp" name="username">
  </div>
  <div class="form-group">
    <label for="password_admin">Contraseña</label>
    <input type="password" class="form-control" id="password_admin" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

<?php
  }else{
    include 'add_product.php';
  }

?>
<script src="../js/app.js"></script>
<?php 
  include 'admin_footer.php';
?>