<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Antispam
{
    public function handle(Request $request, Closure $next)
    {
        // Leer valores de configuracion de Antispam
        $config = config('antispam');
        // Comprobar si no existe el campo 'mi_nombre' en la consulta
        if(! $request->has($config['campo_nombre'])) {
            return $this->abortar();
        }
        // Comprobar si el campo 'mi_nombre' ha sido rellenado
        if(! empty($request->input($config['campo_nombre']))) {
            return $this->abortar();
        }
        // Comprobar cuanto tiempo se tardo en rellenar el formulario
        if($this->tiempoRellenoFormulario($request) <= $config['longitud_tiempo']) {
            return $this->abortar();
        }
        return $next($request);
    }

    // Funcion que devuelve el tiempo que se tardó en rellenar el formulario
    protected function tiempoRellenoFormulario(Request $request) {
        return microtime(true) - $request->input(config('antispam.campo_tiempo'));
    }

    // Funcion que arroja un error 422
    protected function abortar() {
        return abort(422, "Spam detectado");
    }
}
