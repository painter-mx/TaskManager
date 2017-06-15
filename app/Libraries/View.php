<?php
namespace App\Libraries;
class View
{                 //Renderiza la página. recibiendo una variable vista y sus variables para renderizarse
  public static function render($fileView,array $variables = [])
  {
    extract($variables);
    require_once APP_PATH."/views/$fileView.view.php";
  }
}

 ?>
