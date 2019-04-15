<?php

class CarFactory
{
  public static function getCar($type) {
    $class = 'Car'.ucfirst($type);
    // var_dump($class);
    return new $class();
  }
}
