<?php include APP_PATH.'/views/partials/head.view.php';?>

    <div class="container">
        <div class="jumbotron text-center">
          <h1>Servicio Fiscal Contable</h1>
          <p>Bienvenido al sistema de gestión contable</p>
        </div>

    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4">

          <?php if(isset($errorMessage)):?>
            <div class="alert alert-danger">
                <?= $errorMessage; ?>
            </div>
              <?php endif;?>
          <form class="form" method = "POST" action="<?= PUBLIC_PATH.'/login'?>">
            <div class="form-group">
              <label for="user">Usuario:</label>
              <input type="text" class="form-control" id="user" placeholder="Introduzca el usuario" name="user"
              value="<?= $user ?? '' ?>">
            </div>
            <div class="form-group">
              <label for="password">Contraseña:</label>
              <input type="password" class="form-control" id="pwd" placeholder="Introduzca la contraseña" name="password">
            </div>
            <div class="checkbox">
              <label><input type="checkbox" name="remember"> Remember me</label>
            </div>
            <button type="submit" class="btn btn-default">Entrar</button>
        </form>
      </div>
      <div class="col-sm-4"></div>
    </div>
  </div>
  </body>
  </html>
