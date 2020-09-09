<?php
 
class ConeccionDatos
{
  var $DB_USER='root';
  var $DB_PASS='';
  var $DB_HOST='localhost';
  var $DB_NAME='tienda_virtual';
   
  function get_dbuser()
  {
	return $this->DB_USER;
 }
  function get_dbpass()
  {
	return $this->DB_PASS;
	}
  function get_dbhost()
  {
	return $this->DB_HOST;
	}
  function get_dbname()
  {
	return $this->DB_NAME;
	}

}

?>