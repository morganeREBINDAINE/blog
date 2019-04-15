<?php
$app = App::getInstance();
$posts=$app->getTable('post')->all();
$categories=$app->getTable('categorie')->all();

 ?>

    <h1>Catégories</h1>
    <p>
      <a href="?p=categorie.add" class="btn btn-success">Ajouter</a>
    </p>
    <?php
    foreach($categories as $categorie): ?>
    <h2><?= $categorie->id ?>. <?= $categorie->titre ?></h2>
    <a class="btn btn-primary" href="?p=categorie.edit&id=<?= $categorie->id ?>">Editer</a>
    <form action="?p=categorie.delete" style="display:inline" method="post">
      <input type="hidden" name="id" value="<?= $categorie->id ?>">
      <button type="submit" class="btn btn-danger">Supprimer</button>
    </form>
    <?php endforeach; ?>
