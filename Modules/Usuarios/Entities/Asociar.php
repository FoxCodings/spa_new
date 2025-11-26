<?php

namespace Modules\Usuarios\Entities;

use Illuminate\Database\Eloquent\Model;

class Asociar extends Model{

  protected $table = 't_usuarios';
  protected $fillable = [
    'id',
    'id_usuario',
    'id_dependencia',
    'activo',
  ];
  // public function obtCreador(){
  //   return $this->hasOne('\App\User', 'id', 'idUser');
  // }
}
