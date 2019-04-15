<?php
$table = App::getInstance()->getTable('categorie');
if(!empty($_POST)) {
  $result=$table->delete($_POST['id']);
  header('location: admin.php?p=categorie.index');
}
