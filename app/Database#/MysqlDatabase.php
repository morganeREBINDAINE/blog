<?php
namespace App\Database;
use \PDO;

class MysqlDatabase extends Database
{
  private $_dbName;
  private $_dbUser;
  private $_dbPassword;
  private $_dbHost;
  private $_pdo;

  public function __construct($dbName, $dbUser, $dbPassword, $dbHost) {
    $this->_dbName = $dbName;
    $this->_dbUser = $dbUser;
    $this->_dbPassword = $dbPassword;
    $this->_dbHost = $dbHost;
  }

  private function getPDO() {
    if($this->_pdo === null) {
      $pdo= new PDO('mysql:host='.$this->_dbHost.';dbname='.$this->_dbName.';charset=utf8', $this->_dbUser, $this->_dbPassword);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
      $this->_pdo = $pdo;

    }
    return $this->_pdo;
  }

  public function query($statement, $class=null, $one=false) {
    if(!is_null($class)) {
      $req->setFetchMode(PDO::FETCH_CLASS, $class);
    }
    $req = $this->getPDO()->query($statement);
    if($one) {
      $datas = $req->fetch();
    }
    else {
      $datas = $req->fetchAll();
    }
    return $datas;
  }

  public function prepare($statement, $value, $class, $one=false) {
    $req = $this->getPDO()->prepare($statement);
    $req->execute($value);
    $req->setFetchMode(PDO::FETCH_CLASS, $class);

    if($one) {
      $datas = $req->fetch();
    }
    else {
      $datas = $req->fetchAll();
    }
    return $datas;
  }

}
