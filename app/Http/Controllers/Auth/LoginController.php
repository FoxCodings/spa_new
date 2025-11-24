<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/dashboard';
    public function authenticate(Request $request){
  dd($request);

    $credentials = $request->validate([
        'email' => ['required'],
        'password' => ['required'],

    ]);


    dd($credentials);

      if (Auth::attempt($credentials)) {
      $request->session()->regenerate();
      //$usuario = User::where([['username',$request->username],['activo',1]])->first();
      $usuarios = User::where([['email',$request->email],['verificado',1]])->first();
      //dd($usuarios);

      if (isset($usuario)) {
      if ($usuario->activo == 1) {
      return redirect()->intended('/dashboard');
      }else{
      return redirect()->intended('/');
      }
      }

      //User::where('username', $credentials["username"])->update(["last_login" => date('Y-m-d H:i:s')]);
      //return redirect()->intended('/dashboard');
      }

      // if(Auth::attempt($credentialst)){
      //     $request->session()->regenerate();
      //     $usuarios = User::where([['email',$request->username],['estudiante_aceptado',1]])->first();
      //
      //     if ($usuarios->estudiante_aceptado == 1) {
      //       return redirect()->intended('/dashboard');
      //     }else{
      //       return redirect()->intended('/');
      //     }
      //
      // }

      return back()->withErrors([
      'email' => 'Usuario o contraseña incorrecta.',
      ]);
      }

      // public function logout() {
      // \Session::flush();
      // //Auth::logout();
      //
      // return Redirect('/');
      // }

      public function showLoginForm(){
      return view('auth.login');
      }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
