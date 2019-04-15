<?php
namespace App\Table;
use \Core\Table\Table;

class PostTable extends Table
{

  protected $table = 'articles';

  /**
   * Récupère les derniers posts
   * @return array
   */
  public function last() {
    return $this->query('SELECT a.id, texte, a.titre as titre, c.titre as categorie FROM articles a INNER JOIN categories c ON a.categorie_id = c.id');
  }

  public function lastByCategorie($id) {
    return $this->query('SELECT * FROM articles WHERE categorie_id=?', $id);
  }

  public function find($id) {
    return $this->query(
      'SELECT a.id, a.titre, a.texte, a.date_ajout, c.titre categorie, a.categorie_id
      FROM articles a
      INNER JOIN categories c ON a.categorie_id=c.id
      WHERE a.id=?',
      $id,
      true);
  }
}
