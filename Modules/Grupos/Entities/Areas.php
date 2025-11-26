<?php
namespace Modules\Grupos\Entities;

use Illuminate\Database\Eloquent\Model;



class Areas extends Model{
  protected $table = 'cat_area_departamentos';
  protected $primaryKey = "id";
  protected $fillable = [
    "id",
    "cve_cat_dependencia",
    "clave",
    "nombre",
    "area_desc",
    "area_padre",
    "area_partida_pres",
    "centro_gestor",
    "cve_usuario",
    "id_padre",
    "nivel",
    "corto",
    "id_tipo",
    "id_rama",
    "id_orden",
    "cve_usuario_empleado",
    "visible",
    "activo"
  ];

  // public function Dependencia_obt(){
  //    return $this->hasOne('Modules\Compras\Entities\Dependencias', 'id', 'cve_cat_dependencia');
  // }

//   public function obtUser(){
//     return $this->hasOne('Modules\SITIServicios\Entities\UsuarioBitacora', 'id', 'cve_usuario_empleado');
// }

  const CREATED_AT = "created_at";
  const UPDATED_AT = "updated_at";
}
