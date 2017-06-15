<?php
namespace App\Libraries;

class Route
{
  public static function any($controller, $action = 'index') //se manda el controlador y el metodo del controlador
  {
      if ($controller)
      {
        $controller = "\\App\\Controllers\\{$controller}Controller";
        $controller = new $controller;
      }
      else
      {
        $controller = new ArticleController;
      }

      if(method_exists($controller,$action))
      {
        return $controller->$action();   // ejecuta el metodo si esta dentro de el array asociativo en Config
      }
      else
      {
        header('HTTP/1.0 404 Not Found');
        die('Página no encontrada');
      }
  }
}
?>
