<?php
 namespace App\Entity;
 use Core\Entity\Entity;

class CategorieEntity extends Entity
{

  public function __construct() {
    $this->setUrl();
  }

  public function setUrl() {
    $this->url = 'index.php?p=categorie&amp;id='.$this->id;
  }


}
