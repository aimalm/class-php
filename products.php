<?php
class product {
    // properties
  public $name;
  public $price;

  // Constructor
  function __construct($name, $price) {
    $this->name = $name;
    $this->price = $price;
  }

  //Methods
  function get_name() {
    return $this->name;
  }
  function get_price() {
    return number_format($this->price, 2);
  }
}
?>