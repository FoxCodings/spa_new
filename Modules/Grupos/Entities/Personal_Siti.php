<?php
namespace Modules\Grupos\Entities;

use Illuminate\Database\Eloquent\Model;


class Personal_Siti extends Model{
  protected $table = 'cat_personal_jefes';
  protected $primaryKey = "id";
  protected $fillable = [
    "cve_t_empleado",
    "cve_usuario_empleado",
    "nombre_empleado",
    "apellido_p_empleado",
    "apellido_m_empleado",
    "cve_cat_deptos_siti",
    "cve_cat_tipo_resp",
    "cve_cat_tipo_aut",
    "telefono",
    "puesto_empleado",
    "correo_empleado",
    "fecha_baja",
    "motivo_baja",
    "baja",
    "cve_usuario",
    "activo"
  ];

  // public function Dependencia_obt(){
  //    return $this->hasOne('Modules\Compras\Entities\Dependencias', 'id', 'cve_cat_dependencia');
  // }

  const CREATED_AT = "created_at";
  const UPDATED_AT = "updated_at";
}
