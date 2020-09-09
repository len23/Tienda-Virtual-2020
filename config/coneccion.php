<?php 
  require_once('conexion.php');
  	//coneccion con BD
    $Obj_conexion=new conexion();
    $enlace=mysqli_connect($Obj_conexion->get_dbhost(),$Obj_conexion->get_dbuser(),$Obj_conexion->get_dbpass(),$Obj_conexion->get_dbname()) or die('No pudo conectarse, contacte al administrador');
?>