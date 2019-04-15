<?php
namespace Core\Table;
use \Datetime;
use \Core\Database\Database;

class Table
{
  protected $table;
  protected $db;

  public function __construct(Database $db) {
    if(empty($this->table)) {
      $nom= explode('\\', get_called_class());
      $table = strtolower(str_replace('Table', '', end($nom)));
      $this->table = $table.'s';
    }
    $this->db = $db;

  }

  protected function query($statement, $attributes=null, $one=false) {
    if($attributes) {
      return $this->db->prepare(
        $statement,
        $attributes,
        str_replace('Table', 'Entity', get_called_class()),
        $one);
    }
    else {
      return $this->db->query(
        $statement,
        str_replace('Table', 'Entity', get_called_class()),
        $one);
    }
  }

  public function all() {
    // var_dump('SELECT * FROM '.$this->table);
    $datas=$this->query('SELECT * FROM '.$this->table);
    return $datas;
  }

  public function find($id) {
    return $this->query(
      'SELECT * FROM '.$this->table.' WHERE id=?',
      $id,
      true);
  }

  public function update($id, $datas) {

    foreach($datas as $key=>$value) {
      $sql_parts[] = $key.'=?';
      $values[] = $value;
    }

    $values[] = $id;
    $sql=implode(', ',$sql_parts);

    return $this->query('UPDATE '.$this->table.' SET '.$sql.' WHERE id=?', $values);
  }

  public function create($datas) {
    foreach($datas as $key=>$value) {
      $sql_parts[] = $key;
      $values[] = $value;
    }
    if($this->table === 'articles') {
      $datetime=new Datetime();
      $sql_parts[] = 'date_ajout';
      $values[] = $datetime->date;
    }
    $sql=implode(', ',$sql_parts);
    $nb=preg_replace('#[a-z_]+#', '?', $sql);

    return $this->query('INSERT INTO '.$this->table.'('.$sql.') VALUES('.$nb.')', $values);
  }

  public function extract($key, $value) {
    $records = $this->all();
    foreach($records as $v) {
      $return[$v->$key] = $v->$value;
    }
    return $return;
  }

  public function delete($id) {
    return $this->query('DELETE FROM '.$this->table.' WHERE id=?', [$id]);
  }
}
