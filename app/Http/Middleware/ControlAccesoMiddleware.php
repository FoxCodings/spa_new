<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use \Modules\Usuarios\Entities\ModeloHasRoles;
use \Modules\Usuarios\Entities\ModeloRoles;
use \Auth;
use \DB;
class ControlAccesoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

      $blockAccess = true;
      $modulo = obtenerModuloActual();
      $usuario = Auth::user()->id;


      $usario_model = ModeloHasRoles::where('model_id', $usuario)->get();
      //$usario_model = ModeloHasRoles::all();

      $este = [];

      foreach ($usario_model as $key => $value) {
        //dd($value->role_id);

        array_push($este,$value->role_id);
      }

      //dd($este,$usuario, $usario_model);

      // $query = ("
      //   SELECT permissions.modulo FROM role_has_permissions
      //     INNER JOIN permissions ON permissions.id = role_has_permissions.permission_id
      //     WHERE role_has_permissions.role_id = $usario_model->role_id  GROUP BY permissions.modulo
      //   ");

      $orale = implode(',', $este); // Convierte [8,10] en "8,10"

      $query = "
          SELECT permissions.modulo
          FROM role_has_permissions
          INNER JOIN permissions ON permissions.id = role_has_permissions.permission_id
          WHERE role_has_permissions.role_id IN ($orale)
          GROUP BY permissions.modulo
      ";

      $modulos = DB::select($query);

      // $usario_model = ModeloHasRoles::where('model_id',$usuario)->first();
      // //dd($usario_model->role_id);
      // $query =("
      // SELECT permissions.modulo FROM role_has_permissions
      //   INNER JOIN permissions ON permissions.id = role_has_permissions.permission_id
      //   WHERE role_has_permissions.role_id = $usario_model->role_id  GROUP BY permissions.modulo
      // ");
      //
      // $modulos = DB::select($query);

      $este =[];
      foreach ($modulos as $key => $value) {
        array_push($este,$value->modulo);
      }

      //dd(in_array($modulo->alias,$este));
      if(in_array($modulo->alias,$este))$blockAccess = false;

        if($blockAccess){

            return back()->with('message', ['danger', 'No eres Admin no tienes privilegios para acceder']);

        }

        return $next($request);


    }
}
