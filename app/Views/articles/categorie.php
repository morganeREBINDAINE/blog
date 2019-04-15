<?php

$app = App::getInstance();
$categories=$app->getTable('categorie');
$articles = $app->getTable('post');

$categorie=$categories->find([$_GET['id']]);

if($categorie === false) {
  // $app->notFound();
}
$articles= $articles->lastByCategorie([$_GET['id']]);
?>
<h2><?= $categorie->titre ?></h2>
<?php foreach($articles as $a) : ?>
  <h5><a href="<?= $a->url ?>"><?= $a->titre ?></a> </h5>
  <p><?= $a->extrait ?></p>
<?php endforeach; ?>
