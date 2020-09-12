    <!-- Modal Login-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ingresa tus datos de usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="w-75 mx-auto" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
              <div class="form-group">
                <label for="username">Email address</label>
                <input type="email" class="form-control" id="username"aria-describedby="emailHelp" name="username" required>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
              </div>
              <input type="submit" class="btn btn-primary d-block mx-auto" name="submit">
            </form>
          </div>
          <div class="modal-footer justify-content-center">
            <p>No tienes una cuenta: <a href="#" data-toggle="modal" data-target="#submitForm" data-dismiss="modal">Regístrate</a></p>
          </div>
        </div>
      </div>
    </div>
  

