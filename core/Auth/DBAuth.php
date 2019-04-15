<?php
namespace Core\Auth;
use Core\Database\Database;
class DBAuth
{
  protected $db;

  public function __construct(Database $db) {
    $this->db = $db;
  }

  /**
   * Permet de s'authentifier
   * @param $username
   * @param $password
   * @return bool
   */
  public function login($username, $password) {
    $user= $this->db->prepare('SELECT * FROM users WHERE username=?', [$username], null, true);
    if($user) {
      if ($user->password === sha1($password)) {
        $_SESSION['auth'] = $user->id;
        return true;
      }
    }
    else {
      return false;
    }
  }

  public function logged() {
    return isset($_SESSION['auth']);
  }

  public function getUserId() {
    if($this->logged()) {
      return $_SESSION['auth'];
    }
    return false;
  }
}
