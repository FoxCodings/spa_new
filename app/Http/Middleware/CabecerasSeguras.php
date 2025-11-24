<?php

namespace App\Http\Middleware;

use Closure;

class CabecerasSeguras{
  // Podrías checar la siguiente página para más información acerca de estas cabeceras
  // https://securityheaders.com/

  // Lista las cabeceras que no quieras en tus respuestas de tu aplicación
  // Hay cabeceras que no es recomendable que se muestren, por ejemplo "X-Powered-BY" muestra información del servidor, la puedes editar a tu gusto
  private $headersNoAdmitidos = [
    'X-Powered-By',
    'Server',
  ];
  public function handle($request, Closure $next){
    $this->removerCabecerasNoAdmitidas($this->headersNoAdmitidos);
    $response = $next($request);
    $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
    $response->headers->set('X-Content-Type-Options', 'nosniff');
    $response->headers->set('Referrer-Policy', 'no-referrer-when-downgrade');
    $response->headers->set('Strict-Transport-Security', 'max-age:31536000; includeSubDomains');
    return $response;
  }

  private function removerCabecerasNoAdmitidas($listaCabeceras){
    foreach ($listaCabeceras as $cabecera)
    header_remove($cabecera);
  }
}
