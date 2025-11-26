<?php
namespace Modules\Grupos\Entities;

use Illuminate\Database\Eloquent\Model;



class Departamento_Firmantes extends Model{
  protected $table = "firmantes_departamentos";
  protected $primaryKey = "id";
  protected $fillable = [
    "cve_area_departamentos",
    "cve_empleado",
    'cve_cargo',
    "numero_empleado",
    "puesto",
    "nombre",
    "apellido_paterno",
    "apellido_materno",
    "activo",
    "curp",
    "correo",
  ];

  public function obtCargo(){
     return $this->hasOne('\Modules\Catalogos\Entities\CargoFirmante', 'id', 'cve_cargo');
  }

  public function obtDepartamento(){
     return $this->hasOne('\Modules\Catalogos\Entities\Areas', 'id', 'cve_area_departamentos');
  }
  //
  // const CREATED_AT = "created_at";
  // const UPDATED_AT = "updated_at";
}
