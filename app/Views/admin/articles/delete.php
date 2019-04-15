<?php
$table = App::getInstance()->getTable('post');
if(!empty($_POST)) {
  $result=$table->delete($_POST['id']);
  header('location: admin.php');
}
