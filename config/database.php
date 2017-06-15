<?php
  /**
  *
  * se setean los valors de la variable global DATABASE
  **/
  use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => DATABASE['driver'] ?? 'mysql',
    'host'      => DATABASE['host'] ?? 'localhost',
    'database'  => DATABASE['database'] ?? 'mydatabase',
    'username'  => DATABASE['username'] ?? 'root',
    'password'  => DATABASE['password'] ?? 'root',
    'charset'   => DATABASE['charset'] ?? 'utf8',
    'collation' => DATABASE['collation'] ?? 'utf8_unicode_ci',
    'prefix'    => DATABASE['prefix'] ?? '',
]);
$capsule->bootEloquent();

?>
