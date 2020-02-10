<?php

namespace App\Http\Middleware;

use Closure;

class Permission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $valor = $request->session()->get('user');

        //echo $valor;
        if($valor == null) {
            echo 'necessário logar';
            exit();
        }

        return $response;


    }
}
