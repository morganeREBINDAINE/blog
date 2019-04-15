<?php
namespace App\Table;

use App\App;

class Table {
  protected static $table;
  protected $url;

  public static function query($statement, $attributes=null, $one=false) {
    if($attributes) {
      return App::getDb()->prepare($statement, $attributes, get_called_class(), $one);
    }
    else {
      return App::getDb()->query($statement, get_called_class(), $one);
    }
  }

  public static function find($id) {
   return static::query('SELECT * FROM '.static::$table.' WHERE id=?', $id, get_called_class(), true);
  }

  public static function all() {
    return static::query('SELECT * FROM '.static::$table.'');
  }

  public function __get($get) {
    return $this->$get();
  }
}
