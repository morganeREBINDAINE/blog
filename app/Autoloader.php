<?php
namespace App;

class Autoloader
{
  static function register() {
    spl_autoload_register(array(__CLASS__, 'autoload'));
  }

  public static function autoload($nomdelaclasse) {
    if(strpos($nomdelaclasse, __NAMESPACE__ . '\\') === 0 ){
      // var_dump($nomdelaclasse);
      $nomdelaclasse = str_replace(__NAMESPACE__.'\\', '', $nomdelaclasse);
      $nomdelaclasse = str_replace('\\', '/', $nomdelaclasse);
      // var_dump(__DIR__.'\\'.$nomdelaclasse.'.php');
      require(__DIR__.'\\'.$nomdelaclasse.'.php');

    }
  }
}
