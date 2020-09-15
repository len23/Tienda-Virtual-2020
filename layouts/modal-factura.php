<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFactura">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="modalFactura" tabindex="-1" aria-labelledby="modalFacturaLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFacturaLabel">Datos de Facturación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form >
          <div class="form-group">
            <label for="nombres_form">Nombres: </label>
            <input type="text" class="form-control" id="nombres_form" required>
          </div>
          <div class="form-group">
            <label for="apellidos_form">Apellidos: </label>
            <input id="apellidos_form" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="cedula_form">Nro de Cédula: </label>
            <input id="cedula_form" type="text" class="form-control" required>
            <p id="warning_cedula" class="text-danger"></p>
          </div>
          <div class="form-group">
            <label for="direccion_form">Dirección: </label>
            <input id="direccion_form" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="telefono_form">Teléfono: </label>
            <input id="telefono_form" type="text" class="form-control" required>
          </div>
          <button id="submit_factura" type="submit" class="btn btn-primary">Submit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>