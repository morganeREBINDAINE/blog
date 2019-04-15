<?php
use Core\Database\MysqlDatabase;
use Core\Config;

class App
{
  private static $_instance;
  private $db_instance;
  public $title = 'Mon super site';

  public function setTitle($add) {
    $this->title = $add . ' - ' . $this->title;
  }

  public static function getInstance() {
    if(empty(self::$_instance)) {
      self::$_instance = new App();
    }
    return self::$_instance;
  }

  public function getTable($name) {
    $class=ucfirst($name);
    $class = '\\App\\Table\\'.$class.'Table';
    $db = $this->getDb();
    return new $class($db);
  }

  public function getDb() {
    if(empty($this->db_instance)) {
      $config =Config::getInstance(ROOT.'/config/config.php');
      $this->db_instance = new MysqlDatabase($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'));
    }
    return $this->db_instance;
  }

  public static function load() {
    session_start();
    require(ROOT.'/app/Autoloader.php');
    App\Autoloader::register();
    require(ROOT.'/core/Autoloader.php');
    Core\Autoloader::register();
  }

}
