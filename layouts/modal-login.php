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
            <form class="w-75 mx-auto" action="login.php">
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1"aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your emailwith anyone else.</small>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
              </div>
              <button type="submit" class="btn btn-primary d-block mx-auto">Submit</button>
            </form>
          </div>
          <div class="modal-footer justify-content-center">
            <p>No tienes una cuenta: <a href="#">Regístrate</a></p>
          </div>
        </div>
      </div>
    </div>
  

