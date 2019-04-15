<?php
namespace Core\Entity;

abstract class Entity
{
  public $url;
  abstract function setUrl();

  // public function __get($get) {
  //   return $this->$get();
  // }
}
