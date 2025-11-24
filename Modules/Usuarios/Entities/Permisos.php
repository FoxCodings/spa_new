<?php

namespace Modules\Usuarios\Entities;

use Illuminate\Database\Eloquent\Model;

class Permisos extends Model{
  protected $table = 'permissions';
  protected $fillable = [
    'id',
    'name',
    'guard_name',
    'modulo',
    'activo',
  ];
  // public function obtCreador(){
  //   return $this->hasOne('\App\User', 'id', 'idUser');
  // }
}
