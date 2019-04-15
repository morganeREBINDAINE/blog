
<h2><?= $categorie->titre ?></h2>
<?php foreach($articles as $a) : ?>
  <h5><a href="<?= $a->url ?>"><?= $a->titre ?></a> </h5>
  <p><?= $a->extrait ?></p>
<?php endforeach; ?>
