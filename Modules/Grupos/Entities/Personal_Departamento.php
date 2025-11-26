<?php
namespace Modules\Grupos\Entities;

use Illuminate\Database\Eloquent\Model;



class Personal_Departamento extends Model{
  protected $table = "cat_personal_departamento";
  protected $primaryKey = "id";
  protected $fillable = [
    "cve_area_departamentos",
    "cve_empleado",
    "numero_empleado",
    "puesto",
    "nombre",
    "nivel",
    "curp",
    "apellido_paterno",
    "apellido_materno",
    "activo",
  ];

  // public function Dependencia_obt(){
  //    return $this->hasOne('Modules\Compras\Entities\Dependencias', 'id', 'cve_cat_dependencia');
  // }
  //
  // const CREATED_AT = "created_at";
  // const UPDATED_AT = "updated_at";
}
