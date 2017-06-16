
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, user-scalable=no,
    initial-scale=1.0, minimun-scale=1.0"/>
    <link rel="stylesheet" href="<?= PUBLIC_PATH ?>/css/bootstrap.min.css"/>

    <script  type="text/javascript" src="<?= PUBLIC_PATH ?>/js/bootstrap.min.js"></script>
    <script  type="text/javascript" src="<?= PUBLIC_PATH ?>/js/jquery-3.2.1.min.js"></script>
    <title><?=  'Log-in' ?> | Servicio Fiscal Contable</title>
  </head>
  <body>
    <?php   if(isset($_SESSION['signed'])) :?>
    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Servicio Físcal</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?= PUBLIC_PATH ?>/Imss">Imss</a></li>
            <li><a href="<?= PUBLIC_PATH ?>/Tareas">Tareas</a></li>
            <li><a href="<?= PUBLIC_PATH ?>/MisClientes">Mis Clientes</a></li>
            <li><a href="<?= PUBLIC_PATH ?>/Empleados">Empleados</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container text-right">
      <a href="<?= PUBLIC_PATH?>/out">Cerrar sesión</a>
    </div>
  <?php endif?>
