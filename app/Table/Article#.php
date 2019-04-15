<?php
namespace App\Table;

use App\App;

class Article extends Table
{
  protected $extrait;
  protected static $table = 'articles';

  public function url() {
    if($this->url === null) {
      $this->url = 'index.php?p=article&amp;id='.$this->id;
    }
    return $this->url;
  }
  public function extrait() {
    if($this->extrait === null) {
      $html= substr($this->texte,0,50).'...';
      $html .='<a href="'.$this->url().'">Voir la suite</a>';
      $this->extrait = $html;

    }
    return $this->extrait;
  }

  public static function find($id) {
   return static::query(
     'SELECT a.id, a.titre, a.categorie_id, a.texte, c.titre categorie
     FROM articles a
     INNER JOIN categories c
     ON a.categorie_id = c.id
     WHERE a.id=?'
     , $id, __CLASS__, true);
  }

  public static function getLast() {
    return static::query('SELECT a.id, texte, a.titre as titre, c.titre as categorie FROM articles a INNER JOIN categories c ON a.categorie_id = c.id');
  }

  public static function lastByCategorie($id) {
    return static::query('SELECT * FROM '.static::$table.' WHERE categorie_id=?', $id);
  }
}
