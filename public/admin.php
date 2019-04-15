<?php
use \App\Controller\PostController;
define('ROOT', dirname(__DIR__));
require(ROOT.'/app/App.php');
App::load();
$app=App::getInstance();
$postController = new PostController();


if(isset($_GET['p'])) {
  $p = $_GET['p'];
}
else {
  $p = 'home';
}

$auth = new Core\Auth\DbAuth($app->getDb());
if(!$auth->logged()) {
  $app->forbidden();
}


if($p === 'home') {
  // $postController->index();
  // require(ROOT.'/app/Views/admin/articles/index.php');
}
elseif($p === 'post') {
  // $controller->
  // require(ROOT.'/app/Views/articles/single.php');
}
elseif($p==='error') {
  // require(ROOT.'/app/Views/error.php');
}
elseif($p === 'categorie.index') {
  // require(ROOT.'/app/Views/admin/categories/index.php');
}
elseif($p==='articles.edit') {
  // require(ROOT.'/app/Views/admin/articles/edit.php');
}
elseif($p==='articles.add') {
  // require(ROOT.'/app/Views/admin/articles/add.php');
}
elseif($p==='articles.delete') {
  // require(ROOT.'/app/Views/admin/articles/delete.php');
}
elseif($p==='categorie.edit') {
  // require(ROOT.'/app/Views/admin/categories/edit.php');
}
elseif($p==='categorie.add') {
  // require(ROOT.'/app/Views/admin/categories/add.php');
}
elseif($p==='categorie.delete') {
  // require(ROOT.'/app/Views/admin/categories/delete.php');
}
