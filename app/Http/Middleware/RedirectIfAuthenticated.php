<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;
      //dd($request);
      $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],

        ]);

      if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $usuario = User::where([['email',$request->email],['password_name',$request->password],['verificar',1]])->first();
            //$usuarios = User::where([['email',$request->username],['estudiante_aceptado',1]])->first();
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

        return back()->withErrors([
          'email' => 'Usuario o contraseña incorrecta.',
        ]);

        // foreach ($guards as $guard) {
        //     dd($request);
        //
        //     if (Auth::guard($guard)->check()) {
        //
        //
        //         return redirect(RouteServiceProvider::HOME);
        //     }
        // }
        //
        // return $next($request);
    }
}
