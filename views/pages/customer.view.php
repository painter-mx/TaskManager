<?php
  for($i=0;$i<500;$i++){echo " \n";}
include APP_PATH.'/views/partials/head.view.php'?>
      <div class="container">
        <h1>Modúlo del administrador</h1>
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
  </body>
</html>
