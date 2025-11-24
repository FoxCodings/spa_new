<?php

namespace Modules\Usuarios\App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use \Modules\Usuarios\Entities\Roles;
use \Modules\Usuarios\Entities\Permisos;
use \Modules\Usuarios\Entities\RolesPermisos;

use Yajra\Datatables\Datatables;
use \App\Models\User;
use Auth;
use \DB;
class RolesController extends Controller
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
      return view('usuarios::roles.index');
  }


  public function create()
  {
    $data['roles'] = Roles::all();
    $data['permisos'] = Permisos::where('activo',1)->get();
    //dd($data['permisos']);
    return view('usuarios::roles.create')->with($data);
  }

  public function store(Request $request){
    //dd($request->all());
    try {

      $rol = new Roles();
      $rol->name = $request->nombre;
      $rol->guard_name = 'web';
      $rol->save();
      //dd($rol->id);
      foreach ($request->permisos as $key => $value) {
        //dd($value);
        $rolpermisos = new RolesPermisos();
        $rolpermisos->permission_id = $value['permisos'];
        $rolpermisos->role_id = $rol->id;
        $rolpermisos->save();
      }


      return response()->json(['success'=>'Se Agrego Satisfactoriamente']);
    } catch (\Exception $e) {
      dd($e->getMessage());
    }
  }

  public function edit($id){
  $data['rol'] = Roles::find($id);

  $data['permises'] = RolesPermisos::where('role_id',$id)->get();
  $data['permisos'] = Permisos::where('activo',1)->get();
// dd($data['permises']);
  return view('usuarios::roles.create')->with($data);
}

public function update(Request $request){
  try {
    //dd($request->all());

    $rol =  Roles::find($request->id);
    $rol->name = $request->nombre;
    $rol->guard_name = 'web';
    $rol->save();
    //dd($rol->id);


    RolesPermisos::where('role_id',$rol->id)->delete();

    if (isset($request->permisos)) {
      foreach ($request->permisos as $key => $value) {
        //dd($value);
        $rolpermisos = new RolesPermisos();
        $rolpermisos->permission_id = $value['permisos'];
        $rolpermisos->role_id = $rol->id;
        $rolpermisos->save();
      }
    }

     return response()->json(['success'=>'Ha sido editado con éxito']);

  } catch (\Exception $e) {
    dd($e->getMessage());
  }

}




  public function tablaroles(){
    setlocale(LC_TIME, 'es_ES');
    \DB::statement("SET lc_time_names = 'es_ES'");
    $registros = Roles::all(); //user es una entidad que se trae desde la app
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
          "href" => "/usuarios/roles/$value->id/edit" //esta ruta esta en el archivo web
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

      if (!Auth::user()->can('editar roles')) {
        unset($acciones['Editar']);
      }

      if (!Auth::user()->can('eliminar roles')) {
        unset($acciones['Eliminar']);
      }

    $value->acciones = generarDropdown($acciones);
    }
    $datatable->setData($data);
    return $datatable;
  }


}
