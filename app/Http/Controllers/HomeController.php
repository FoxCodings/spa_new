<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Modules\Usuarios\Entities\Roles;
use \Modules\Usuarios\Entities\RolesPermisos;
use \Modules\Usuarios\Entities\ModeloRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;
use \DB;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use Illuminate\Routing\Controller;

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
    public function index()
    {
        return view('home');
    }

    // public function index()
    // {
    //   return view('dashboard');
    // }

    public function actualizar(Request $request){
      //dd('entro');
      //dd(Auth::user()->tipo_usuario);
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

    public function as2(Request $request)
    {
        $loginAs = \Auth::user()->id;
        $user = User::find($request->id);
        \Auth::login($user);

        $idOriginal = $request->session()->get('idOriginal');
        if (is_null($idOriginal)) {
            $request->session()->put('idOriginal', $reserva);
        } elseif ($idOriginal == $user->id) {
            $request->session()->forget('idOriginal');
        }

        return 1;

    }
}
