<?php
$table = App::getInstance()->getTable('post');
if(!empty($_POST)) {
  $result=$table->update($_GET['id'], ['titre'=>$_POST['titre'], 'texte'=>$_POST['texte'], 'categorie_id'=>$_POST['categorie_id']]);
  // die();
  if($result) {
    echo 'Tout va bien : les modifications ont été effectuées !';
  }
}

$post = $table->find([$_GET['id']]);
// $categories = App::getInstance()->getTable('categorie')->all();
$categories = App::getInstance()->getTable('categorie')->extract('id', 'titre');
$form= new Core\HTML\Form($post);
 ?>

 <form method="post">
   <?= $form->input('titre', 'Titre de l\'article') ?>
   <?= $form->input('texte', 'Contenu', 'textarea') ?>
   <?php // $form->select('categorie_id', 'Catégorie', $categories, $post->categorie) ?>
   <?= $form->select('categorie_id', 'Catégorie', $categories) ?>
   <?= $form->submit() ?>
 </form>
