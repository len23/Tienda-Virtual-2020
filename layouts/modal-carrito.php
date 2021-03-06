<!-- Vertically centered modal para el carrito-->
<?php  include './config/variables.php'; ?>
  <div class="modal fade  mx-auto" id="productDetail<?php echo  $result_ar['PRODUCTO_ID']?>" tabindex="-1" aria-labelledby="productDetailLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered w-75 mx-auto">
        <div class="modal-content">
          <div class="modal-header flex-column">
            <div class="d-flex flex-space-between w-100">
              <h3 class="text-uppercase" id="exampleModalLabel"><?php echo $result_ar['CATEGORY'] ?></h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php 
            if(!isset($_SESSION['user_id'])){
             echo  '<p class="bg-danger w-50 mx-auto text-center text-white font-weight-bold">Necesitas estar logeado para agregar al carrito<br>
                    Si no tienes una cuenta <a href="#" data-toggle="modal" data-target="#submitForm" data-dismiss="modal">regístrate</a> o si ya tienes una
                    <a href="#" data-toggle="modal" data-target="#exampleModal" data-dismiss="modal">inicia sesión</a>.
             </p>'; 
            }
            ?>
          </div>
          <div class="modal-body d-flex align-items-center">
            <img class="w-50" src="<?php echo $result_ar['IMAGE']?>" alt="sax">
            <div class="px-3">
              <p><?php echo $result_ar['DESCRIPCION']?></p>
              <label for="quantity">Cantidad</label>
              <input class="cant_prod" id="quantity-<?php echo $result_ar['PRODUCTO_ID']?>" type="number" min="1">
            </div>
          </div>
          <div class="modal-footer">

           
           <?php if(isset($_SESSION['user_id'])) { 
            echo '<a id="go-to-cart-'.$result_ar['PRODUCTO_ID'].'" class="btn btn-warning text-danger d-none" href="http://localhost/Tienda-Virtual-2020/pages/carrito.php">Ir al carrito</a>';
            echo  '<a type="button" onclick="addProduct('. $result_ar['PRODUCTO_ID'] .','.$_SESSION['user_id'].')" id="add_carrito-'. $result_ar['PRODUCTO_ID'].'"  class="btn btn-info">Agregar al carrito</a>';
            echo  '<button onClick="history.go(0);" type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>';
           } else{ 
            echo '<a href="#" class="btn btn-info mr-3" data-toggle="modal" data-target="#exampleModal" data-dismiss="modal">Agregar al Carrito</a>';
            echo  '<button type="button" class="btn btn-danger id="add_carrito" data-dismiss="modal">Cerrar</button>';
            }
            ?>
          </div>
        </div>
    </div>
  </div>

