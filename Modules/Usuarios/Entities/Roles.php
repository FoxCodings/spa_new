<?php

namespace Modules\Usuarios\Entities;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model{

  protected $table = 'roles';
  protected $fillable = [
    'id',
    'name',
    'guard_name',
  ];
  // public function obtCreador(){
  //   return $this->hasOne('\App\User', 'id', 'idUser');
  // }
}
