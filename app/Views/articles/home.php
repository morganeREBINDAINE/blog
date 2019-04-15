<?php
use App\Table\Categorie;
 ?>
<div class="row">
  <div class="col-sm-8">
    <h1>Voici la home page</h1>
    <?php
    $app = App::getInstance();
    $posts = $app->getTable('post');
    // var_dump($posts->all());
// die();

    foreach($posts->last() as $post): ?>
    <a href="<?= $post->url ?>"><?= $post->titre ?> </a> (categorie : <?= $post->categorie ?>)
    <p><?= $post->extrait ?> </p>

  <?php
  endforeach;
  ?>
  </div>
  <div class="col-sm-4">
    <ul>
    <?php
    $categories = $app->getTable('categorie');
    // var_dump($categories->all());
    // die();
    foreach($categories->all() as $categorie) : ?>
      <li><a href="<?= $categorie->url ?>"><?= $categorie->titre ?></a> </li>
    <?php
  endforeach; ?>
    </ul>
  </div>
</div>
