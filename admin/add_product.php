  
  
  <div class="container py-5">
  <?php 
  
    if(isset($_GET['message'])) {
      echo "<p class='text-center bg-success text-white py-4 w-50 mx-auto succes-product' >". $_GET['message'] ."</p>";
    }
  ?>
    <form action="add_product_method.php" method="post" enctype="multipart/form-data">
      <div class="row border-bottom pb-3">
        <div class="col-4">
          <div class="border h-75 preview">
            
          </div>
          <div class="form-group">
            <label for="uploadImage" class="btn btn-info mt-4">Upload Image</label>
            <input type="file" class="form-control-file" id="uploadImage" name="uploadImage">
          </div>
        </div>
        <div class="col-8">
          <div class="form-group">
            <label for="category_product">Categoría de producto</label>
            <select class="custom-select" id="category_product" name="category_product">
              <option selected>Eliga...</option>
              <option value="Desktop">Desktop</option>
              <option value="Desktop All in One">Desktop All in One</option>
              <option value="RAM Memory">RAM Memory</option>
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
