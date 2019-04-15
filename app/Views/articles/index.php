<div class="row">
  <div class="col-sm-8">
    <h1>Voici la home page</h1>
    <?php
    foreach($posts as $post): ?>
    <a href="<?= $post->url ?>"><?= $post->titre ?> </a> (categorie : <?= $post->categorie ?>)
    <p><?= $post->extrait ?> </p>
  <?php
  endforeach;
  ?>
  </div>
  <div class="col-sm-4">
    <ul>
    <?php
    foreach($categories as $categorie) : ?>
      <li><a href="<?= $categorie->url ?>"><?= $categorie->titre ?></a> </li>
    <?php
  endforeach; ?>
    </ul>
  </div>
</div>
