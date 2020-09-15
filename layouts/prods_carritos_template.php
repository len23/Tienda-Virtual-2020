

<div class="row border-bottom">
    <div class="col d-flex align-items-center">
    <div class="text-center">
      <img class="img_carrito_prod" src="<?php echo $img_prod ?>" alt="imagen producto">
      <p class="descp_carrito_prod"><?php echo $descp_prod?></p>
    </div>
    <div class="pl-5">
      <p>Cantidad: <?php echo $cantidad?></p>
      <p>Precio: $<?php echo $precio_prod?></p>
      <p><strong>Total:</strong> $<?php echo $cantidad * $precio_prod?></p>
    </div>
    <div class="text-center flex-grow-1">
      <a href="<?php echo $delete_prod_carrito . '?carrito_id=' . $carrito_id?>" class="btn btn-danger">Eliminar</a>
    </div>
    </div>
  </div>

