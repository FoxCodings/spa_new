<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\CorreoRegistro;
use App\Mail\CorreoOlvide;
use App\Models\User;
use \Modules\Usuarios\Entities\Roles;
use \Modules\Usuarios\Entities\RolesPermisos;
use \Modules\Usuarios\Entities\ModeloRoles;

class WelcomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }

    public function index()
    {
        $data['roles'] = Roles::where('id',6)->get();
      return view('registrar')->with($data);
    }

    public function verificar($id){
      $data['usuario'] = $id;
      return view('verificar')->with($data);
    }

    public function Registrar(Request $request){
      try {
        //dd($request->all());
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

         $email = $request->email;
        //$email = 'hector_vargas89@hotmail.com';

          // dd($email);
        $subject = 'SPARTASYSTEMS: Registro de Usuario';

        $nombre = $request->nombre;
        $app = $request->apellido_paterno;
        $apm = $request->apellido_materno;

        $permitted_chars = '0123456789';
        $contraseña_global = substr(str_shuffle($permitted_chars), 0, 5);


        $usuari = User::find($usuario->id);
        $usuari->codigo = $contraseña_global;
        $usuari->save();


        $message = $nombre.','.$app.','.$apm.','.$contraseña_global.','.$usuario->id;

        Mail::to($email)->send( new CorreoRegistro($subject,$message));

        return response()->json(['success'=>'Registrado Satisfactoriamente']);
      } catch (\Exception $e) {
        dd($e->getMessage());
      }

    }

    public function verificarUser(Request $request){

      $usuario = User::where([
        ['id',$request->usuario],
        ['codigo',$request->codigo],
      ])->first();

      if (isset($usuario)) {
        $respuesta = response()->json(['success'=>'Código válido']);
        $usuar = User::where([
          ['id',$usuario->id],
          ['codigo',$request->codigo],
        ])->update([
          'verificar' => 1
        ]);
      }else{
        $respuesta = response()->json(['success'=>'Código no válido']);
      }

      return $respuesta;
    }

    public function reenviarCodigo(Request $request){
      //dd($request->all());
      $usuari = User::find($request->usuario);
      $subject = 'SPARTASYSTEMS: Registro de Usuario';
      $message = $usuari->nombre.','.$usuari->apellido_paterno.','.$usuari->apellido_materno.','.$usuari->codigo.','.$usuari->id;
      Mail::to($usuari->email)->send( new CorreoRegistro($subject,$message));
      return response()->json(['success'=>'reenviado']);
    }


}
