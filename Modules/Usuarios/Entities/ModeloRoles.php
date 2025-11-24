<?php

namespace Modules\Usuarios\Entities;

use Illuminate\Database\Eloquent\Model;

class ModeloRoles extends Model{
  public $timestamps = false;
  protected $table = 'model_has_permissions';
  protected $fillable = [
    'permission_id',
    'model_type',
    'model_id',
  ];
  // public function obtCreador(){
  //   return $this->hasOne('\App\User', 'id', 'idUser');
  // }
}
