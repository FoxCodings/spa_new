<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

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
      return view('dashboard');
    }

    public function actualizar(Request $request){
      //dd('entro');

      $roles_permisos = RolesPermisos::where('role_id',Auth::user()->tipo_usuario)->get();
       ModeloRoles::where('model_id',Auth::user()->id)->delete();
       foreach ($roles_permisos as $key => $value) {
         $modelo = new ModeloRoles();
         $modelo->permission_id = $value['permission_id'];
         $modelo->model_type = 'App\Models\User';
         $modelo->model_id = Auth::user()->id;
         $modelo->save();
       }


       Cache::flush();



       return 1;
    }
}
