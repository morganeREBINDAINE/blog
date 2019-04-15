<?php
$table = App::getInstance()->getTable('categorie');
if(!empty($_POST)) {
  $result=$table->update($_GET['id'], ['titre'=>$_POST['titre']]);
  if($result) {
    echo 'Tout va bien : les modifications ont été effectuées !';
  }
}

$categorie = $table->find([$_GET['id']]);
$form= new Core\HTML\Form($categorie);
 ?>

 <form method="post">
   <?= $form->input('titre', 'Titre de la catégorie') ?>
   <?= $form->submit() ?>
 </form>
