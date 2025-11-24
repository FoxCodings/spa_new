<?php

namespace Modules\Usuarios\Entities;

use Illuminate\Database\Eloquent\Model;

class Mensajes extends Model{

  protected $table = 't_mensajes';
  protected $fillable = [
    'id',
    'id_usuario',
    'mensaje',
    'activo',
  ];
  // public function obtCreador(){
  //   return $this->hasOne('\App\User', 'id', 'idUser');
  // }
}
