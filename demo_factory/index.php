<?php
require('CarFactory.php');
require('car.php');
require('car_citadine.php');
require('car_4x4.php');
$car= CarFactory::getCar('4x4');
var_dump($car);
