<?php

use \Modules\Usuarios\Entities\Roles;
use \Modules\Usuarios\Entities\Permisos;
use \Modules\Usuarios\Entities\ModeloHasRoles;
use \Modules\Usuarios\Entities\ModeloRoles;
use \Modules\Usuarios\Entities\RolesPermisos;
use \Modules\Usuarios\Entities\Mensajes;


if (! function_exists('obtenerModuloActual')) {
  function obtenerModuloActual() {
    $namespace = Route::current()->action['namespace'];
    $namespace = explode("\\", $namespace);
    if ( $namespace[0] == "Modules" ) {
      return Module::find( $namespace[1] )->json();
    }
    return false;
  }
}
if (! function_exists('obtenerModulosActivos')) {
  function obtenerModulosActivos() {
    $modulos = Module::all();
    $tmp = [];
    foreach ($modulos as $key => $value) {

      if ($value->get('active') === 0) {
        unset($modulos[$key]);


      }else {
        $tmp[( $titulo = $value->get('titulo') ) ? $titulo : $value->get('name')] = $value;
      }
    }
    ksort($tmp);

    return $tmp;
  }
}


if (! function_exists('obtenerModulo')) {
  function obtenerModulo() {
    //dd(\Auth::user()->id);
    $usuario = Auth::user()->id;
    //$usuario = 5;

    $usario_model = ModeloHasRoles::where('model_id',$usuario)->first();


    $query =("
    SELECT permissions.modulo FROM role_has_permissions
      INNER JOIN permissions ON permissions.id = role_has_permissions.permission_id
      WHERE role_has_permissions.role_id = $usario_model->role_id  GROUP BY permissions.modulo
    ");

    $modulos = DB::select($query);


    // $modulos = RolesPermisos::join('permissions','permissions.id','role_has_permissions.permission_id')->where([
    //   ['role_has_permissions.role_id',$usario_model->model_id]
    // ])->first();
    // $tmp = [];
    // foreach ($modulos as $key => $value) {
    //
    //   dd($value->modulo);
    //
    // }
  //dd($modulos);

    return $modulos;
  }
}

if (!function_exists('mensajes')) {
  function mensajes(){
    //$usuario = Auth::user()->id;
    $usuario = 5;

    $mensajes = Mensajes::where([
      ['activo',1],
      ['id_usuario',$usuario]
    ])->get();

    return $mensajes;
  }
}



////////////////////////////////////////////////////////////////////////////////
if (! function_exists('obtenerModuloActualIntro')) {
  function obtenerModuloActualIntro() {
    $namespace = Route::current()->action['namespace'];
    $namespace = explode("\\", $namespace);
    if ( $namespace[0] == "Modules" ) {
      return Module::find( $namespace[1] )->json();
    }
    return false;
  }
}
if (! function_exists('obtenerModulosActivosIntro')) {
  function obtenerModulosActivosIntro() {
    $modulos = Module::all();
    //dd($modulos);
    $tmp = [];
    foreach ($modulos as $key => $value) {

      if ($value->get('active') === 0) {
        unset($modulos[$key]);


      }else {
          //dd($key);
        //unset();
        if ($key == 'Usuarios') {
          // code...
        }else if($key == 'Inicio'){

        }else{
          $tmp[( $titulo = $value->get('titulo') ) ? $titulo : $value->get('name')] = $value;
        }

      }
    }
    ksort($tmp);

    return $tmp;
  }
}
///////////////////////////////////////////////////////////////////////////////
if (!function_exists('generarDropdown')) {
  function generarDropdown( $acciones = [] ){

    if (count($acciones) > 0) {
      $dropdown =
        "<div class='dropdown'>
          <button type='button' class='btn btn-secondary dropdown-toggle'  role='button' data-bs-toggle='dropdown' aria-expanded='false' ></i><span class='caret'></span> </button>
          <div class='dropdown-menu '  >";
      foreach ($acciones as $key => $value) {
        $attrData = "";
        if (array_key_exists('data', $value)) {
          foreach ($value['data'] as $keyData => $data) {
            $attrData .= " data-" . $keyData . "='" . $data . "'" ;
          }
        }
        if ( array_key_exists('onclick', $value) ) {
          $dropdown .=
            "<div class='dropdown-item' onclick=".$value["onclick"]." ".$attrData.">
              $key
            </div>";
        }else if(array_key_exists('href', $value)) {
          $dropdown .=
            "<a class='dropdown-item' href='".$value["href"]."' ".$attrData.
            (array_key_exists('target', $value) ? " target='".$value["target"]."'" : "").">
              $key
            </a>";
        }else if(array_key_exists('class', $value)) {
          $dropdown .=
            "<a class='dropdown-item " . $value["class"] . "' href='javascript:void(0);' ".$attrData.">
              $key
            </a>";
        }
      }
      $dropdown .= "</div></div>";
      return $dropdown;
    }
    return "";
  }
}
// if (!function_exists('permiso')) {
//   function permiso( $claveModulo, $accion = false ){
//
//
//   //  $datos['firmas'] = obtenerModulosActivos()->get('active');
//
//     //dd(obtenerModulosActivos()->get('active'));
//     foreach (obtenerModulosActivos() as $key => $modulo){
//       //dd($modulos,$modulo);
//       $arrayPredios = array();
//       if ($modulo->get('alias') == 'usuarios') {
//         $alias = $modulo->get('alias');
//         $titulo = $modulo->get('titulo') ? $modulo->get('titulo') : $modulo->get('name');
//
//         if($modulo->get('contenido')){
//           foreach ($modulo->get('contenido') as $key => $contenido) {
//               $valor = mb_strtolower( implode( '_', explode(' ', $key) ), 'utf-8' );
//           }
//
//           if(array_key_exists('permisos', $contenido)){
//             foreach ($contenido['permisos'] as $keyts => $permiso){
//               $valor = mb_strtolower( implode( '_', explode(' ', $permiso) ), 'utf-8' );
//               //dd($permiso);
//
//               array_push($arrayPredios, $permiso);
//
//             }
//           }
//
//         }
//       }
//     }
//       $permisos = $arrayPredios;
//       //dd($datos['predios']);
//     // $module = Module::find($claveModulo);
//     // dd($module);
//   //  $permisos = ( is_null(session()->get('permisos')) ) ? [] : session()->get('permisos');
//     //dd(session()->get('titulo'));
//     //dd($permisos);
//     // if (Auth::user()->activo == 1) {
//     //   return true;
//     // }
//     //dd($permisos);
//     if ( array_key_exists($claveModulo, $permisos) ){
//       if ($accion === false) {
//         return true;
//       }else{
//
//         $accion = str_replace(' ', '_', $accion);
//         //dd($accion, $claveModulo, in_array(strtolower($accion), $permisos[$claveModulo]));
//         if ( in_array(strtolower($accion), $permisos[$claveModulo]) ) {
//           return true;
//         }
//         return false;
//       }
//     }
//     return false;
//   }
// }




if (!function_exists('usuariosConRol')) {
  function usuariosConRol( $rol ){
    //dd($rol);
    $usuarios = \App\User::where('activo','1')
      ->where('tipo_usuario', 'like', '%"'.$rol.'"%')
      ->get();
    return $usuarios;
  }
}
if (!function_exists('obtUsuariosConPermisos')) {
  function obtUsuariosConPermisos( $claveModulo, $permiso, $admin = false ){
    $tmp = [];
    $rolesConPermiso = \Modules\Usuarios\Entities\Roles::where('activo', 1)
      ->get();
    foreach ($rolesConPermiso as $key => $value) {
      $permisos = json_decode($value->permisos);

      if ( array_key_exists($claveModulo, $permisos) && in_array(str_replace(' ', '_', $permiso), $permisos->$claveModulo)) {
        $xx = usuariosConRol($value->id)->map(function($x){
            return $x->id;
        })->toArray();
        $tmp = array_merge($tmp, $xx);
      }else{
        unset($rolesConPermiso[$key]);
      }
    }
    if ($admin === true) {
      $usuarios = \App\Models\User::where([['activo', 1],['tipo_usuario',1]])->get()->pluck('id')->toArray();
      $tmp = array_merge($tmp, $usuarios);
    }
    return $tmp;
  }
}
if (!function_exists('plonGangster')) {
  function plonGangster( $e ){
    $plus = [
      'url' => $_SERVER['REQUEST_URI'],
      'agente' => $_SERVER['HTTP_USER_AGENT']
    ];
    if (Auth::user()) {
      $plus['user'] = Auth::user()->getAttributes();
    }
    \App\Log::create([
      'message' => $e->getMessage(),
      'plus' => json_encode($plus)
    ]);
  }
}
