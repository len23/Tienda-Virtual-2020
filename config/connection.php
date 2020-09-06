<?php

  /**
   * Joy of PHP sample code
   * Demostrates how to create a database, create a table, and insert records.
   */
  $mysqli = new mysqli('localhost','root','');

  if(!$mysqli) {
    die('Could not connect:'.mysqli_error($mysqli));
  }
    echo 'Connected successfully to mySQL. <BR>';
  
 //select a database to work with
$mysqli->select_db("tienda_virtual");
echo("Selected the tienda_virtual database");

/* $query = "CREATE TABLE INVENTORY (VIN varchar(17) PRIMARY KEY, YEAR INT, Make varchar(50), ASKING_PRICE DECIMAL(10,2), SALE_PRICE DECIMAL (10,2), PURCHASE_PRICE DECIMAL (10,2), MILEAGE int,
TRANSMISSION varchar (50), PURCHASE_DATE DATE, SALE_DATE DATE)"; */


//echo "<p>**********</p>"
//$query
//echo "<p>*********</p>
/*if($mysqli->query($query)===TRUE) 
{
  echo "Database table ‘INVENTORY’ created</P>";
}
else{
  echo "<p>Error:". mysqli_error($mysqli)."</p>";
}


$query = "INSERT INTO `cars`.`inventory` (`VIN`, `YEAR`, `MAKE`, `Model`, `TRIM`, `EXT_COLOR`, `INT_COLOR`, `ASKING_PRICE`, `SALE_PRICE`, `PURCHASE_PRICE`, `MILEAGE`, `TRANSMISSION`, `PURCHASE_DATE`, `SALE_DATE`) VALUES ('JSUWER4264562W', '2015', 'Nissan', 'Versa', 'Pilot', 'Wine', 'Black', '15000', '15000', '12000', '0', 'Manual','2015-06-21', NULL)";

if($mysqli->query($query) === TRUE)
{
  echo "<p>Nissan Versa inserted into inventory table. </p>";
}
else
{
  echo "<p>Error inserting Nissan Versa: </p>" . mysqli_error($mysqli);
  echo "<p>************</p>";
  echo $query;
  echo "<p>************</p>";
}

$mysqli->close(); */
?>