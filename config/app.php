<?php
session_start();
/**
* se definen los paths a utilizar detro de la aplicación
*
**/
define('APP_PATH',__DIR__. '/../');
define('PUBLIC_PATH','http://www.serviciofiscal.com:80');

//COMPOSER LOADER
require_once APP_PATH.'vendor/autoload.php';
// enviroment variables
require_once 'env.php';
// database
require_once 'database.php';
// aray con rutas
require_once 'routes.php';



?>
