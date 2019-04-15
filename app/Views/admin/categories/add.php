<?php
$table = App::getInstance()->getTable('categorie');
if(!empty($_POST)) {
  $result=$table->create($_POST);
  if($result) {
    header('location: admin.php?p=categorie.index');
  }
}

$form= new Core\HTML\Form();
// var_dump($form->data);
 ?>

 <form method="post">
   <?= $form->input('titre', 'Titre de la catégorie') ?>
   <?= $form->submit() ?>
 </form>
