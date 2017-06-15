<?php

require_once '../config/app.php';
use App\Libraries\Route;

//require_once APP_PATH.'/views/pages/index.view.php';
//require_once APP_PATH.'/views/articles/index.view.php';
//require_once APP_PATH.'/views/articles/show.view.php';
/*
* la variable URL se cacha siempre en el index y se determina
* que hacer con ella.
*
*/
$url = $_GET['url'] ?? '';
$route = ROUTES[$url] ?? false;

if($route)
{
  $controller = $route['controller'];
  $action = $route['action'];
  //$page   = $route['pageselected'];
  Route::any($controller,$action);
}
else {
  header('HTTP/1.0 404 Not Found');
  die(Route::any('Page','notFound'));
}
 // se manda a llamar al cntrolador

?>
