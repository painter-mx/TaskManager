<?php
  for($i=0;$i<500;$i++){echo " \n";}
include APP_PATH.'/views/partials/head.view.php';?>
      <div class="container text-center">

        <?php if(isset($successMessage)):?>
          <div class="alert alert-success">
              <?= $successrMessage; ?>
          </div>
            <?php endif;?>
            
        <h1>Mis Clientes</h1>

        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <div class="text-right">
              <a href="<?= PUBLIC_PATH ?>/addCustomer">Añadir Cliente</a>
            </div>
            <table class = "table table-hover">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>RFC</th>
                  <th>Télefono</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($customersInfo as $customerInfo):?>
                <tr>
                  <td><?= $customerInfo->FirstName?></td>
                  <td><?= $customerInfo->RFC?></td>
                  <td><?= $customerInfo->Telefono?></td>
                  <td>
                   <form class="form" method = "POST" action="<?= PUBLIC_PATH.'/customerAction'?>">
                      <input type="hidden"  name="customerId" value="<?= $customerInfo->id?>"></input>
                      <button type="submit" class="btn btn-danger" name="delete">Eliminar</button>
                      <button type="submit" class="btn btn-primary" name="edit">Editar</button>
                    </form>
                  </td>
                </tr>
              <?php endforeach;?>
              </tbody>
            </table>
        </div>
        <div class="col-md-1"></div>
      </div>
      </div>
  </body>
</html>
