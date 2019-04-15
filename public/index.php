<?php
use \App\Controller\PostController;
define('ROOT', dirname(__DIR__));
require(ROOT.'/app/App.php');
App::load();

$postController = new PostController();

if(isset($_GET['p'])) {
  $p = $_GET['p'];
}
else {
  $p = 'home';
}

ob_start();
if($p === 'home') {
  $postController->index();
  // require(ROOT.'/app/Views/articles/home.php');
}
elseif($p === 'post') {
  $postController->show();
  // require(ROOT.'/app/Views/articles/single.php');
}
elseif($p === 'categorie') {
  $postController->categorie();
  // require(ROOT.'/app/Views/articles/categorie.php');
}
elseif($p==='error') {
  $postController->error();
  // require(ROOT.'/app/Views/error.php');
}
elseif($p==='login') {
  $userController->login();
  // require(ROOT.'/app/Views/users/login.php');
}
$content = ob_get_clean();

require(ROOT.'/app/Views/templates/default.php');
