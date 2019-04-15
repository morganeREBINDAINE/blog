<?php
$app = App::getInstance();
$posts=$app->getTable('post')->all();
$categories=$app->getTable('categorie')->all();

 ?>

    <h1>Articles</h1>
    <p>
      <a href="?p=articles.add" class="btn btn-success">Ajouter</a>
    </p>

    <?php
    foreach($posts as $post): ?>
    <h2><?= $post->id ?>. <?= $post->titre ?></h2>
    <a class="btn btn-primary" href="?p=articles.edit&id=<?= $post->id ?>">Editer</a>
    <form action="?p=articles.delete" style="display:inline" method="post">
      <input type="hidden" name="id" value="<?= $post->id ?>">
      <button type="submit" class="btn btn-danger">Supprimer</button>
    </form>
    <?php endforeach; ?>
