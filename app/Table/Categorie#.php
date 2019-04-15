<?php
namespace App\Table;

use App\App;

class Categorie extends Table
{
  protected static $table = 'categories';

  public function url() {
    if($this->url === null) {
      $this->url = 'index.php?p=categorie&amp;id='.$this->id;
    }
    return $this->url;
  }

}
