<?php

class Product {
  public $id;
  public $name;
  public $price;
  public $description;
  public $image;

  // Methods
  function get_product($name) {
    $this->name = $name;
  }


}
?>