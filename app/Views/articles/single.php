<?php
use App\Table\PostTable;
// use App\Table\CategorieTable;
$app = App::getInstance();
$posts=$app->getTable('post');
$post = $posts->find([$_GET['id']]);

if($post === false) {
  $app->notFound();
}

$app->setTitle($post->titre);
?>

<div class="row">
  <div class="col-sm-8">
    <h2><?= $post->titre ?> </h2>
    <p>(<?= $post->categorie ?>)</p>
    <p><?= $post->texte ?></p>
  </div>
  <div class="col-sm-4">

  </div>
</div>
