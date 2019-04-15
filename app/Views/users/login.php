<?php
$form= new Core\HTML\Form($_POST);

if(!empty($_POST)) {
  $auth = new \Core\Auth\DBAuth(App::getInstance()->getDb());
  if($auth->login($_POST['username'], $_POST['password'])){
    header('Location:admin.php');
  }
  else {
    echo 'Identifiants incorrects';
  }
}
 ?>

 <form method="post">
   <?= $form->input('username', 'Pseudo') ?>
   <?= $form->input('password', 'Pot de passe', 'password') ?>
   <?= $form->submit() ?>
 </form>
