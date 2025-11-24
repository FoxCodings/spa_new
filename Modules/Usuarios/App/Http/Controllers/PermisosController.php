<?php

namespace Modules\Usuarios\App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
// use \Modules\Usuarios\Entities\TipoUsuarios;
use \Modules\Usuarios\Entities\Roles;
use \Modules\Usuarios\Entities\Permisos;

use Yajra\Datatables\Datatables;
use \App\Models\User;
use Auth;
use \DB;
class PermisosController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware(function ($request, $next) {
        $this->user = Auth::user();
        return $next($request);
    });
  }

  public function index()
  {
      return view('usuarios::permisos.index');
  }


  public function create()
  {
    return view('usuarios::permisos.create');
  }

  public function store(Request $request){

    try {

      $permisos = new Permisos();
      $permisos->name = $request->name;
      $permisos->guard_name = 'web';
      $permisos->modulo = $request->modulo[0];
      $permisos->save();

      return response()->json(['success'=>'Se Agrego Satisfactoriamente']);
    } catch (\Exception $e) {
      dd($e->getMessage());
    }
  }

  public function edit($id){
  $data['permisos'] = Permisos::find($id);
  return view('usuarios::permisos.create')->with($data);
  }

  public function update(Request $request){
    try {

      $permisos = Permisos::find($request->id);
      $permisos->name = $request->name;
      $permisos->guard_name = 'web';
      $permisos->modulo = $request->modulo[0];
      $permisos->save();
      return response()->json(['success'=>'Ha sido editado con éxito']);
    } catch (\Exception $e) {
      dd($e->getMessage());
    }

  }

  public function virificarpermiso(Request $request){
    $permisos = Permisos::where('name',$request->name)->first();
    return $permisos;
  }

  public function destroy(Request $request)
  {
    try {
      $alumnos = Permisos::find($request->id);
      $alumnos->activo = 0;
      $alumnos->save();
      return response()->json(['success'=>'Registro eliminado exitosamente']);
    } catch (\Exception $e) {
      dd($e->getMessage());
    }
  }


  public function tablapermisos(){
    setlocale(LC_TIME, 'es_ES');
    \DB::statement("SET lc_time_names = 'es_ES'");
    $registros = Permisos::where('activo',1); //user es una entidad que se trae desde la app
    $datatable = DataTables::of($registros)
    // ->editColumn('tipo_usuario', function ($registros) {
    //   // if ($registros->tipo_usuario==1) {
    //   //     $usuario_tipo="Administrador";
    //   // }else{
    //   //    $usuario_tipo="Editor";
    //   // }
    //   //  return $usuario_tipo;
    //   return $registros->obtenerUser->nombre;//relacion
    //  })
    ->make(true);
    //Cueri
    $data = $datatable->getData();
    foreach ($data->data as $key => $value) { //el array acciones se constuye en el helpers dropdown - helpers esta con bootsrap

      $acciones = [
        // "Ver" => [
        //   "icon" => "edit blue",
        //   "href" => "/usuarios/$value->id/show"
        // ],
        "Editar" => [
          "icon" => "edit blue",
          "href" => "/usuarios/permisos/$value->id/edit" //esta ruta esta en el archivo web
        ],
        "Eliminar" => [
          "icon" => "edit blue",
          "onclick" => "eliminar($value->id)"
        ],
        // "Login As" => [
        //   "icon" => "user blue",
        //   "href" => "/usuarios/loginAs/$value->id"
        // ]
      ];

      if (!Auth::user()->can('editar permisos')) {
        unset($acciones['Editar']);
      }

      if (!Auth::user()->can('eliminar permisos')) {
        unset($acciones['Eliminar']);
      }


    $value->acciones = generarDropdown($acciones);
    }
    $datatable->setData($data);
    return $datatable;
  }


}
