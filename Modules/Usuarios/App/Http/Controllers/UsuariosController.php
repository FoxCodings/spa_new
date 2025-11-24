<?php

namespace Modules\Usuarios\App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use \Modules\Usuarios\Entities\Roles;
use \Modules\Usuarios\Entities\RolesPermisos;
use \Modules\Usuarios\Entities\ModeloRoles;
use \Modules\Usuarios\Entities\Mensajes;
use \Modules\Usuarios\Entities\Api;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;
use \App\Models\User;
use Auth;
use \DB;
class UsuariosController extends Controller
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
     * @return Renderable
     */
    public function index()
    {
        return view('usuarios::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {

      $data['roles'] = Roles::all();

      return view('usuarios::create')->with($data);
    }

    public function notificaciones(){

        $data['usuarios'] = User::all();
        return view('usuarios::notificaciones')->with($data);
    }

    public function enviarnotificacion(Request $request){
      //dd($request->all());
      $mensajes = new Mensajes();
      $mensajes->id_usuario = $request->name;
      $mensajes->mensaje = $request->mensaje;
      $mensajes->save();
      event(new \App\Events\EnviarMensaje($request->name,$request->mensaje));

      return response()->json(['success'=>'Se Envio Satisfactoriamente']);
    }

    public function verMensajes(Request $request){
      $mensajes = Mensajes::find($request->id);
      return $mensajes;
    }

    public function EliminarMensajes(Request $request){
      $mensajes = Mensajes::find($request->id);
      $mensajes->activo = 0;
      $mensajes->save();
      return response()->json(['success'=>'Se Elimino Satisfactoriamente']);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
     public function store(Request $request)//es post siempre
     {
         try {
           //dd($request->all()); //verifica dd checa la variable dd da todo lo que trae el request
           $rol = Roles::find($request->tipo_usuario);

           $usuario = new User();
           $usuario->nombre = $request->nombre;
           $usuario->apellido_paterno = $request->apellido_paterno;
           $usuario->apellido_materno = $request->apellido_materno;
           $usuario->tipo_usuario = $request->tipo_usuario;
           $usuario->name = $request->name;
           $usuario->email = $request->email;
           $usuario->password = bcrypt($request->password);
           $usuario->password_name = $request->password;
           $usuario->cve_usuario = Auth::user()->id;
           $usuario->assignRole($rol->name);
           $usuario->save();

           $roles_permisos = RolesPermisos::where('role_id',$request->tipo_usuario)->get();

            foreach ($roles_permisos as $key => $value) {
              $modelo = new ModeloRoles();
              $modelo->permission_id = $value['permission_id'];
              $modelo->model_type = 'App\Models\User';
              $modelo->model_id = $usuario->id;
              $modelo->save();
            }



           return response()->json(['success'=>'Se Agrego Satisfactoriamente']);

         } catch (\Exception $e) {
             dd($e->getMessage());
         }

     }


    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('usuarios::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
      $data['usuarios'] = User::find($id);

      $data['roles'] = Roles::all();
      return view('usuarios::create')->with($data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
     public function update(Request $request, $id)
     {
     try {
       //dd($request->all(),$id);
       $rol = Roles::find($request->tipo_usuario);

       $user_pass=Auth::user()->password_name;
       if ($user_pass==$request->password) {
         $usuario = User::find($id);
         $usuario->nombre = $request->nombre;
         $usuario->apellido_paterno = $request->apellido_paterno;
         $usuario->apellido_materno = $request->apellido_materno;
         $usuario->tipo_usuario = $request->tipo_usuario;
         $usuario->name = $request->name;
         $usuario->email = $request->email;
         $usuario->syncRoles($rol->name);
         $usuario->cve_usuario = Auth::user()->id;
         $usuario->save();


         $roles_permisos = RolesPermisos::where('role_id',$request->tipo_usuario)->get();
         ModeloRoles::where('model_id',$usuario->id)->delete();
         foreach ($roles_permisos as $key => $value) {
           $modelo = new ModeloRoles();
           $modelo->permission_id = $value['permission_id'];
           $modelo->model_type = 'App\Models\User';
           $modelo->model_id = $usuario->id;
           $modelo->save();
         }

         return response()->json(['success'=>'Ha sido editado con éxito']);
       }
       else{
         $usuario = User::find($id);
         $usuario->nombre = $request->nombre;
         $usuario->apellido_paterno = $request->apellido_paterno;
         $usuario->apellido_materno = $request->apellido_materno;
         $usuario->tipo_usuario = $request->tipo_usuario;
         $usuario->name = $request->name;
         $usuario->email = $request->email;
         $usuario->password = bcrypt($request->password);
         $usuario->password_name = $request->password;
         $usuario->syncRoles($rol->name);
         $usuario->cve_usuario = Auth::user()->id;
         $usuario->save();

         $roles_permisos = RolesPermisos::where('role_id',$request->tipo_usuario)->get();
         ModeloRoles::where('model_id',$usuario->id)->delete();
         foreach ($roles_permisos as $key => $value) {
          $modelo = new ModeloRoles();
          $modelo->permission_id = $value['permission_id'];
          $modelo->model_type = 'App\Models\User';
          $modelo->model_id = $usuario->id;
          $modelo->save();

         }
         return response()->json(['success'=>'Ha sido editado con éxito']);
       }

     } catch (\Exception $e) {
         dd($e->getMessage());
     }

 }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Request $request)
    {
      try {
        $usuario = User::find($request->id_user);
        $usuario->activo = 0;
        $usuario->save();
        return response()->json(['success'=>'Eliminado exitosamente']);
      } catch (\Exception $e) {
        dd($e->getMessage());
      }
    }

    public function tablausuarios(){
      //dd('hola');
      setlocale(LC_TIME, 'es_ES');
      \DB::statement("SET lc_time_names = 'es_ES'");
      $registros = User::where('activo', 1)->get(); //user es una entidad que se trae desde la app

      $datatable = DataTables::of($registros)
      ->editColumn('tipo_usuario', function ($registros) {
        return $registros->obtenerUser->name;//relacion
       })
      ->make(true);
      //Cueri
      $data = $datatable->getData();
      foreach ($data->data as $key => $value) { //el array acciones se constuye en el helpers dropdown - helpers esta con bootsrap
        $acciones = [
          "Editar" => [
            "icon" => "edit blue",
            "href" => "/usuarios/$value->id/edit" //esta ruta esta en el archivo web
          ],
          "Eliminar" => [
            "icon" => "edit blue",
            "onclick" => "eliminar($value->id)"
          ],
          // "Login as" => [ "onclick" => "as('$value->id')" ],
        ];
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
        //     $acciones = [
        //
        //     ];
        //   }

        if (!Auth::user()->can('editar usuario')) {
          unset($acciones['Editar']);
        }

        if (!Auth::user()->can('eliminar usuario')) {
          unset($acciones['Eliminar']);
        }

        if (!Auth::user()->can('login as')) {
          unset($acciones['Login as']);
        }

        // if (!Auth::user()->can('asociar')) {
        //   unset($acciones['Asociar']);
        // }

      $value->acciones = generarDropdown($acciones);
      }
      $datatable->setData($data);
      return $datatable;
    }

    public function tablamensaje(){
      setlocale(LC_TIME, 'es_ES');
      \DB::statement("SET lc_time_names = 'es_ES'");
      $registros = Mensaje::where('activo', 1); //user es una entidad que se trae desde la app
      $datatable = DataTables::of($registros)
      // ->editColumn('tipo_usuario', function ($registros) {
      //   return $registros->obtenerUser->name;//relacion
      //  })
      ->make(true);
      //Cueri
      $data = $datatable->getData();
      foreach ($data->data as $key => $value) { //el array acciones se constuye en el helpers dropdown - helpers esta con bootsrap


            $acciones = [
              "Ver Mensaje" => [
                "icon" => "edit blue",
                "href" => "/usuarios/chat/$value->id/chat" //esta ruta esta en el archivo web
              ],
              "Eliminar" => [
                "icon" => "edit blue",
                "onclick" => "eliminarMensaje($value->id)"
              ],
            ];



      $value->acciones = generarDropdown($acciones);
      }
      $datatable->setData($data);
      return $datatable;
    }


    public function archivos(Request $request){

      $files = Storage::allFiles();
      return $files;
    }

    public function Eliminararchivos(Request $request){
      $files = Storage::allFiles();

      //dd(array_key_exists($request->id, $files));

      foreach ($files as $key => $value) {
        //dd($key,$value,$request->id);
        //dd($key == $request->id);

      //  var_dump(array_key_exists($request->id,$key));
        if ($request->id == $key) {
            //dd($value);
            $filets = Storage::delete($value);
            return $filets;
        }


      }


      //dd($filets);



    }

    public function as(Request $request){
      $reserva = \Auth::user()->id;
      $user = User::find($request->id);


      $r = \Auth::loginUsingId($user->id);
      //dd($r);
      $idOriginal = $request->session()->get('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d');
        //dd($request->session()->forget('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d'));
          if ( is_null($idOriginal) ) {
            //dd('entrp');
            $request->session()->put('idOriginal', $reserva);
          }else if( $idOriginal == $user->id ){
            //dd('entrpaqui');

            $request->session()->forget('idOriginal');
          }

      return response()->json(['success'=>'cambio de usuario exitosamente']);
      // return redirect('/dashboard');
    }
    public function as2(Request $request){
      $loginAs = \Auth::user()->id;
      $user = User::find($request->id);
      \Auth::login($user);

      $idOriginal = $request->session()->get('idOriginal');
      if ( is_null( $idOriginal ) ) {
        $request->session()->put('idOriginal', $reserva);
      }else if( $idOriginal == $user->id ){
        $request->session()->forget('idOriginal');
      }


      return 1;

    }


    public function archivosview(){
      return view('usuarios::archivos');
    }


    public function api(Request $request){
      header('Access-Control-Allow-Origin: *');
      header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
      header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

      $datosRecibidos = file_get_contents("php://input");
      $ch=curl_init();
      $url = 'https://proyectoscete.tamaulipas.gob.mx/rh/laboratoristas/index';
      curl_setopt($ch, CURLOPT_URL,$url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $json = curl_exec($ch);
      curl_close ($ch);
      $obj = json_decode($json,true);
      //dd($obj);
      foreach ($obj as $key => $value) {
         foreach ($value as $key => $valuets) {
           //dd($valuets);
            $existe = Api::where([
              ['nombre',$valuets['nombre']],
              ['apellido_paterno',$valuets['apellido_paterno']],
              ['apellido_materno',$valuets['apellido_materno']],
              ['activo',1]
            ])->first();

            if (isset($existe)) {

            $api = Api::find($existe->id);
            $api->nombre = $valuets['nombre'];
            $api->apellido_paterno = $valuets['apellido_paterno'];
            $api->apellido_materno = $valuets['apellido_materno'];
            $api->email = $valuets['correo'];
            $api->curp = $valuets['curp'];
            $api->rfc = $valuets['rfc'];
            $api->cve_usuario = Auth::user()->id;
            $api->save();


            }else{

              $api = new Api();
              $api->nombre = $valuets['nombre'];
              $api->apellido_paterno = $valuets['apellido_paterno'];
              $api->apellido_materno = $valuets['apellido_materno'];
              $api->email = $valuets['correo'];
              $api->curp = $valuets['curp'];
              $api->rfc = $valuets['rfc'];
              $api->cve_usuario = Auth::user()->id;
              $api->save();


            }

         }
       }
         return response()->json(['success'=>'Ha sido agregados con éxito']);
    }

    public function subirImagen(Request $request)
      {
        try {
          ////////////// imagen /////////////////////
          if( isset($request->imagen) ){
            $nombre = $request->imagen->getClientOriginalName();
            $file = $request->imagen->getPathName();
            $fileName = pathinfo($nombre, PATHINFO_FILENAME);

            //dd($request->imagen);
            // Upload using a stream...
            $subir_imagen = Storage::disk('google')->put($nombre, fopen($file, 'r+'));

            //$credentialsFilePath = Storage::disk('google')->put('test.text','hola primer archivo');

             $dir = '/';
             $recursive = false; // Get subdirectories also?
             $contents = collect(Storage::disk('google')->listContents($dir, $recursive));

             // Get file details...
             $files = $contents
                 ->where('type', '=', 'file')
                 ->where('filename', '=', pathinfo($nombre, PATHINFO_FILENAME))
                 ->where('extension', '=', pathinfo($nombre, PATHINFO_EXTENSION))
                 ->first(); // there can be duplicate file names!

                 //dd($files);
             $service      = Storage::disk('google')->getAdapter()->getService();

             $permission   = new \Google_Service_Drive_Permission();
             $permission->setRole('reader');
             $permission->setType('anyone');
             //$permission->setAllowFileDiscovery(false);

             $permissions  = $service->permissions->create($files['basename'], $permission);


             $rest = explode("/", $files["path"]);
             $url = "https://lh3.googleusercontent.com/d/".end($rest)."=w1000";
          }
          ////////////////// crear galeria /////////////////

          $galerias = new Galerias;
          $galerias->titulo_imagen_galeria = $request->titulo_imagen_galeria;
          $galerias->descripcion_galeria = $request->descripcion_galeria;
          $galerias->imagen_galeria = $url;
          $galerias->save();


          return response()->json(['success'=>'Se Agrego Satisfactoriamente']);
        } catch (\Exception $e) {
          dd($e->getMessage());
        }


      }


}
