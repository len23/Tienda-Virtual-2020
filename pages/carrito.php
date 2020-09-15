<?php
session_start();
include '../config/variables.php';
include '../components/general_header.php';
include '../components/header.php';
?>

<h1 class="text-center my-4 font-weight-bold text-uppercase">Tu carrito de compras</h1>
 <?php include '../controllers/prods_carrito.php' ?>

<?php
include '../components/footer.php';
?>