<?php

namespace Modules\Usuarios\Entities;

use Illuminate\Database\Eloquent\Model;

class RolesPermisos extends Model{
  public $timestamps = false;
  protected $table = 'role_has_permissions';
  protected $fillable = [
    'permission_id',
    'role_id',
  ];

  public function obtPermiso(){
    return $this->hasOne('\Modules\Usuarios\Entities\Permisos', 'id', 'permission_id');
  }

  public function obtCreador(){
    return $this->hasOne('\App\User', 'id', 'idUser');
  }

}
