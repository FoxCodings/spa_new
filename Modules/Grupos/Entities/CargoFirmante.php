<?php

namespace Modules\Grupos\Entities;

use Illuminate\Database\Eloquent\Model;

class CargoFirmante extends Model{
  protected $table = "cat_cargo";
  protected $fillable = [
    "id",
    "nombre",
  ];


}
