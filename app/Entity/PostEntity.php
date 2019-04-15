<?php
 namespace App\Entity;
 use Core\Entity\Entity;

class PostEntity extends Entity
{
  public $extrait;
  

  public function __construct() {
    $this->setUrl();
    $this->setExtrait();
  }

  public function setUrl() {
    $this->url = 'index.php?p=post&amp;id='.$this->id;
  }

  public function setExtrait() {
    $html= substr($this->texte,0,50).'...';
    $html .='<a href="'.$this->url.'">Voir la suite</a>';
    $this->extrait = $html;
  }

}
