<?php

namespace App;

class App
{
  private static $_instance;
  private static $settings;
  public $title = "Mon super site";

  // private static $database;
  // private static $title = "Mon super site";

  public static function getInstance() {
    if(empty(self::$_instance)) {
      self::$_instance = new App();
    }
    return self::$_instance;
  }

  public function get($key) {
    if(isset(self::$settings[$key])) { return self::$settings[$key]; }
  }

  private function __construct() {
    self::$settings = require dirname(__DIR__).'/config/config.php';
  }

  // public static function getDb() {
  //   if(self::$database === null) {
  //     self::$database = new Database(self::$settings['db_name'], self::$settings['db_user'], self::$settings['db_pass'], self::$settings['db_host']);
  //   }
  //   return self::$database;
  // }
  //
  // public static function notFound() {
  //   header('location:index.php?p=404');
  // }
  //
  // public static function getTitle() {
  //   return self::$title;
  // }
  //
  // public static function setTitle($title) {
  //   self::$title = $title . ' - ' . self::$title;
  // }
}
