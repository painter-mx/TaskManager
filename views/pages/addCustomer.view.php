<?php include APP_PATH.'/views/partials/head.view.php';?>

<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <?php if(isset($errorMessage)):?>
        <div class="alert alert-danger">
            <?= $errorMessage; ?>
        </div>
          <?php endif;?>
      <form method="POST" action="<?= PUBLIC_PATH?>/addCustomerAction">
        <div class="form-group row">
          <div class="col-md-6">
            <label for="Nss">N.S.S. :</label>
            <input type="text" name="SocialSecure" value ="<?= $nss ?? '' ?>"class="form-control" id="Nss">
          </div>
          <div class="col-md-6">
            <label for="RFC">RFC :</label>
            <input type="text" name="RFC" value ="<?= $rfc ?? ''?>"class="form-control" id="RFC">
          </div>
        </div>
        <div class="form-group">
          <label for="name">Nombre :</label>
          <input type="text" name="FirstName" value ="<?= $name ?? '' ?>"class="form-control" id="name">
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-6">
              <label for="LastNamePat">Apellido paterno :</label>
              <input type="text" name="LastNamePat" value="<?= $lastNamePat ?? ''?>" class="form-control" id="LastNamePat">
            </div>
            <div class="col-md-6">
              <label for="LastNameMat">Apellido materno :</label>
              <input type="text" name="LastNameMat" value="<?= $lastNameMat ?? ''?>" class="form-control" id="LastNameMat">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="Address">Dirección :</label>
          <input type="text" name="Address" value="<?= $address ?? ''?>" class="form-control" id="Direccion">
        </div>
        <div class="form-group row">
          <div class="col-md-6">
            <label for="Phone">Teléfono :</label>
            <input type="text" name="Phone" value="<?= $phone ?? '' ?>" class="form-control" id="Phone">
          </div>
          <div class="col-md-6">
            <label for="Email">Email :</label>
            <input type="mail" name="Email" value="<?= $email ?? ''?>" class="form-control" id="Email">
          </div>
        </div>
        <div class="checkbox">
          <label><input type="checkbox"> Remember me</label>
        </div>
        <button type="submit" name="addCustomer" class="btn btn-default">Agregar</button>
      </form>
    </div>
    <div class="col-md-3"></div>
  </div>
</div>
