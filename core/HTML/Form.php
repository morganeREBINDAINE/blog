<?php
namespace Core\HTML;
use \DateTime;
/**
  * Class Form
  * Permet de générer un formulaire rapidement et simplement
  */

class Form
{
  /**
    * @var array Données utilisées par le formulaire
    */
  public $data;


  /**
    * @var string Tag utilisé pour mettre en forme les input
    */
  protected $surround = 'p';



  /**
    * @param array $data Donnéees envoyées par le formulaire
    */

  public function __construct($data=array()) {
    $this->data = $data;
  }

  /**
    * @param $content string Code à entourer de balises
    * @return string
    */
  private function surround($content) {
    return "<{$this->surround}>$content</{$this->surround}>";
  }

  /**
    * @param $key retourne la valeur associée a cette variable dans l'attribut $data
    * @return bool;
    */
  public function getValue($index) {
    if(is_object($this->data)) {
      return $this->data->$index;
    }
    return isset($this->data[$index]) ? $this->data[$index] : null;
  }

  /**
    * @param $name string Valeur de la balise name de l'input créé
    * @return string
    */
  public function input($name, $label, $type=null) {
    $type = isset($type) ? $type : 'text';
    $label = '<label>'.$label.'</label>';
    if($type === 'textarea') {
      $input = '<textarea name="'.$name.'" value="'.$this->getValue($name).'">'.$this->getValue('texte').'</textarea>';
    }
    else {
      $input = '<input type="'.$type.'" name="'.$name.'" placeholder="'.$name.'" value="'.$this->getValue('titre').'">';
    }
    return $label.$this->surround($input);
  }

  // public function select($name, $label, $options, $actual) {
  //   $label = '<label>'.$label.'</label>';
  //   $select = '<select name="'.$name.'">';
  //   foreach($options as $option) {
  //     if($option->titre === $actual) {
  //       $select.='<option value="'.$option->id.'" selected>'.ucfirst($option->titre).'</option>';
  //
  //     }
  //     else {
  //       $select.='<option value="'.$option->id.'">'.ucfirst($option->titre).'</option>';
  //
  //     }
  //   }
  //   $select.= '</select>';
  //   return $label.$this->surround($select);
  // }

  public function select($name, $label, $options) {
    $label = '<label>'.$label.'</label>';
    $input = '<select name="'.$name.'">';
    foreach($options as $k => $v) {
      $attributes = '';
      if($k == $this->getValue($name)) {
        $attributes = ' selected';
      }
      $input .= '<option value="'.$k.'"'.$attributes.'>'.$v.'</option>';
    }
    $input .= "</select>";
    // var_dump($input);
    return $this->surround($label.$input);
  }

  /**
    * @param $name string Valeur de la balise name de l'input créé
    * @return string
    */

  public function submit() {
    return $this->surround('<button type="submit">Envoyer</button>');
  }

  public static function datetime() {
    $date = new DateTime();
    var_dump($date);
  }
}
