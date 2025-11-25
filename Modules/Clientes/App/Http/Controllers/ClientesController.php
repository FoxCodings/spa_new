<?php

namespace Modules\Clientes\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use \Modules\Clientes\Entities\Clientes;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;
use Auth;
use \DB;

class ClientesController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    $this->middleware(function ($request, $next) {
        $this->user = Auth::user();
        return $next($request);
    });
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('clientes::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      try {


          $cliente = new Clientes();
          $cliente->nombre = $request->nombre;
          $cliente->apellido_paterno = $request->apellido_p;
          $cliente->apellido_materno = $request->apellido_m;
          $cliente->telefono = $request->telefono;
          $cliente->correo_electronico = $request->email;
          $cliente->modulo = 1;
          $cliente->cve_usuario = Auth::user()->id;
          $cliente->save();


        return response()->json(['success'=>'Se Agrego Satisfactoriamente']);

      } catch (\Exception $e) {
        dd($e->getMessage());
      }
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('clientes::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
      $data['clientes'] = Clientes::find($id);
        return view('clientes::create')->with($data);
    }

    public function editar(Request $request){
      return Clientes::find($request->id);
    }

    public function traerDatos(){
      return Clientes::where([
        ['activo',1],
        ['modulo',1]
      ])->orderBy('id','DESC')->get();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
      try {


          $cliente = Clientes::find($request->id);
          $cliente->nombre = $request->nombre;
          $cliente->apellido_paterno = $request->apellido_p;
          $cliente->apellido_materno = $request->apellido_m;
          $cliente->telefono = $request->telefono;
          $cliente->correo_electronico = $request->email;
          $cliente->modulo = 1;
          $cliente->cve_usuario = Auth::user()->id;
          $cliente->save();

        return response()->json(['success'=>'Ha sido editado con éxito']);

      } catch (\Exception $e) {
        dd($e->getMessage());
      }
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy(Request $request)
      {
        try {
          //dd($request->all());
          $usuario = Clientes::find($request->id);
          $usuario->activo = 0;
          $usuario->save();
          return response()->json(['success'=>'Eliminado exitosamente']);
        } catch (\Exception $e) {
          dd($e->getMessage());
        }
      }

    public function tablaclientes(){
      setlocale(LC_TIME, 'es_ES');
      \DB::statement("SET lc_time_names = 'es_ES'");
      $registros = Clientes::where([['activo', 1],['modulo',1]])->get(); //user es una entidad que se trae desde la app
      $datatable = DataTables::of($registros)
      ->make(true);
      //Cueri
      $data = $datatable->getData();
      foreach ($data->data as $key => $value) { //el array acciones se constuye en el helpers dropdown - helpers esta con bootsrap

        // if(Auth::user()->can(['editar usuario','eliminar usuario'])){
        //     $acciones = [
        //       "Editar" => [
        //         "icon" => "edit blue",
        //         "href" => "/usuarios/$value->id/edit" //esta ruta esta en el archivo web
        //       ],
        //       "Eliminar" => [
        //         "icon" => "edit blue",
        //         "onclick" => "eliminar($value->id)"
        //       ],
        //       "Login as" => [ "onclick" => "as('$value->id')" ],
        //     ];
        //   }else if(Auth::user()->can('eliminar usuario')){
        //     $acciones = [
        //       "Eliminar" => [
        //         "icon" => "edit blue",
        //         "onclick" => "eliminar($value->id)"
        //       ],
        //     ];
        //   }else if(Auth::user()->can('editar usuario')){
        //     $acciones = [
        //       "Editar" => [
        //         "icon" => "edit blue",
        //         "href" => "/usuarios/$value->id/edit" //esta ruta esta en el archivo web
        //       ],
        //     ];
        //   }else{
            $acciones = [
              "Editar" => [
                "icon" => "edit blue",
                "href" => "/clientes/$value->id/edit" //esta ruta esta en el archivo web
              ],
              "Eliminar" => [
                "icon" => "edit blue",
                "onclick" => "eliminar($value->id)"
              ],
            ];
          // }


      $value->acciones = generarDropdown($acciones);
      }
      $datatable->setData($data);
      return $datatable;
    }
}
