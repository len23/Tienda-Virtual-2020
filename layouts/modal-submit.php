    <?php 
      /* include './config/register.php' */
    ?>
    <!-- Modal Submit-->
    <div class="modal fade" id="submitForm" tabindex="-1" aria-labelledby="submitFormLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="submitFormLabel">Ingresa tus datos de usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="w-75 mx-auto" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="Email">
              </div>
              <div class="form-group">
                <label for="names">Nombres:</label>
                <input type="text" class="form-control" id="names" name="Names">
              </div>
              <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" name="Password">
              </div>
              <div class="form-group">
                <label for="secondPassword">Repite la Contraseña</label>
                <input type="password" class="form-control" id="secondPassword" name="Second_Password">
              </div>
              <button type="submit" class="btn btn-primary d-block mx-auto" name="submit2">Ingresar</button>
            </form>
            <?php echo $mensaje?>
          </div>
        </div>
      </div>
    </div>
  