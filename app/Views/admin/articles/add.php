<?php
$table = App::getInstance()->getTable('post');
if(!empty($_POST)) {
  // $result=$table->create($_POST);
  $result=$table->create(['titre'=>$_POST['titre'], 'texte'=>$_POST['texte'], 'categorie_id'=>$_POST['categorie_id']]);

  if($result) {
    header('location: admin.php?p=post&id='.App::getInstance()->getDb()->lastInsertId());
  }
}

$categories = App::getInstance()->getTable('categorie')->extract('id', 'titre');
$form= new Core\HTML\Form($_POST);
// var_dump($form->data);
 ?>

 <form method="post">
   <?= $form->input('titre', 'Titre de l\'article') ?>
   <?= $form->input('texte', 'Contenu', 'textarea') ?>
   <?= $form->select('categorie_id', 'Catégorie', $categories) ?>
   <?= $form->submit() ?>
 </form>
