<?php

namespace Modules\Usuarios\Entities;

use Illuminate\Database\Eloquent\Model;

class TipoUsuarios extends Model{
  protected $table = "tipo_usuario";
  protected $primaryKey = "id";
  protected $fillable = [
    "nombre",
    "activo"
  ];


}
