<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  protected $table = 'Users';

  // datos del usuarios
  public function Employees()
  {
    return $this->belongsToMany('App\Models\Employees'); // lo toma como un atributo de la tabla
  }
  public function getPriceFloatAttribute()
  {
    $price = (float) $this->attributes['precio'] / 100;
    return  round($price,2);
  }
}

?>
