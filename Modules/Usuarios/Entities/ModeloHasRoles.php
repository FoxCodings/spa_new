<?php

namespace Modules\Usuarios\Entities;

use Illuminate\Database\Eloquent\Model;

class ModeloHasRoles extends Model{
  public $timestamps = false;
  protected $table = 'model_has_roles';
  protected $fillable = [
    'role_id',
    'model_type',
    'model_id',
  ];
  // public function obtCreador(){
  //   return $this->hasOne('\App\User', 'id', 'idUser');
  // }
}
