<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Antispam
{
    public function handle(Request $request, Closure $next)
    {
        // Comprobar si no existe el campo 'mi_nombre' en la consulta
        if(! $request->has('mi_nombre')) {
            abort(422, "Spam detectado");
        }
        // Comprobar si el campo 'mi_nombre' ha sido rellenado
        if(! empty($request->input('mi_nombre'))) {
            abort(422, "Spam detectado");
        }
        // Comprobar cuanto tiempo se tardo en rellenar el formulario
        $ahora = microtime(true);
        $tiempo_transcurrido = $ahora - $request->input('tiempo');
        if($tiempo_transcurrido <= 3) {
            abort(422, "Spam detectado");
        }
        return $next($request);
    }
}
