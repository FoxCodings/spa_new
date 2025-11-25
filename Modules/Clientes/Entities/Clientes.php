<?php

namespace Modules\Clientes\Entities;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model{

  protected $table = 'clientes';
  protected $fillable = [
    'id',
    'nombre',
    'apellido_paterno',
    'apellido_materno',
    'cumpleanos',
    'telefono',
    'correo_electronico',
    'modulo',
    'activo',
  ];
  // public function obtCreador(){
  //   return $this->hasOne('\App\User', 'id', 'idUser');
  // }
}
