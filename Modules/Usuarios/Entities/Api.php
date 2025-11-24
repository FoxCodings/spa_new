<?php

namespace Modules\Usuarios\Entities;

use Illuminate\Database\Eloquent\Model;

class Api extends Model{

  protected $table = 'api';
  protected $fillable = [
    'id',
    'nombre',
    'apellido_paterno',
    'apellido_materno',
    'email',
    'curp',
    'rfc',
    'cve_usuario',
    'activo',
  ];
  // public function obtCreador(){
  //   return $this->hasOne('\App\User', 'id', 'idUser');
  // }
}
