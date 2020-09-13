  <div class="container py-5">
    <form action="add_product_method.php" method="post">
      <div class="row border-bottom pb-3">
        <div class="col-4">
          <div class="border h-75"></div>
          <button class="btn btn-primary mt-3">Agregar Imagen</button>
        </div>
        <div class="col-8">
          <div class="form-group">
            <label for="category_product">Categoría de producto</label>
            <select class="custom-select" id="category_product" name="category_product">
              <option selected>Eliga...</option>
              <option value="1">Desktop</option>
              <option value="2">Desktop All in One</option>
              <option value="3">RAM Memory</option>
            </select>
          </div>
          <div class="form-group">
            <label for="descp_prod">Descripcion</label>
            <input type="text" class="form-control" id="descp_prod" name="descp_prod" required>
          </div>
          <div class="form-group">
            <label for="prec_prod">Precio</label>
            <input type="number" class="form-control" id="prec_prod" name="prec_prod" required>
          </div>
        </div>
      </div>
      <div class="add_container text-center mt-5">
          <button type="submit" class="btn btn-info btn-lg">Agregar Producto</button>
      </div>
      
    </form>
  </div>
