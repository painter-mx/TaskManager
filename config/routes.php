<?php
define ('ROUTES',[
  '' => ['controller' => 'Page','action' => 'index'],
  'login' => ['controller' => 'Page', 'action' => 'login'],
  'administrator'=>['controller' => 'Administrator','action' => 'index'],
  'customerAction'=>['controller'=>'Administrator','action'=>'customerAction'],
  'MisClientes'=>['controller'=>'Page','action'=>'customerIndex'],
  'Tareas'=>['controller'=>'Page','action'=>'tasksIndex'],
  'Empleados'=>['controller'=>'Page','action'=>'employeesIndex'],
  'Imss'=>['controller'=>'Page','action'=>'imssIndex'],
  'out'=>['controller'=>'Page','action'=>'out'],
  'addCustomer'=>['controller'=>'Page','action'=>'addCustomerIndex'],
  'addCustomerAction'=>['controller'=>'Administrator','action'=>'addCustomerAction']
  /*,
  'nosotros' => ['controller' => 'Page','action' => 'about','pageselected' => 'Nosotros'],
  'productos' => ['controller' => 'Article', 'action' => 'index','pageselected' => 'Productos'],
  'producto' => ['controller' => 'Article', 'action' => 'show','pageselected' => 'Producto'],
  'contacto' => ['controller' => 'Page','action' => 'contact', 'pageselected' => 'Contacto']*/
]);
?>
