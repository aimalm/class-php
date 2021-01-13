<?php
class product {
  public $name;
  public $price;

  function __construct($name, $price) {
    $this->name = $name;
    $this->price = $price;
  }
}
?>