<?php
// use App\Autoloader;
// use App\App;
// require('../app/Autoloader.php');
// Autoloader::register();
//
// $app= App::getInstance();


if(isset($_GET['p'])) {
  $p = $_GET['p'];
}
else {
  $p = 'home';
}



ob_start();
'coucou';
if($p==='article') {
  require('../pages/single.php');
}
elseif($p === 'categorie') {
  require('../pages/categorie.php');
}
elseif(($p === 'home')) {
  require('../pages/articles/home.php');
}
$content= ob_get_clean();

require('../pages/templates/default.php');
