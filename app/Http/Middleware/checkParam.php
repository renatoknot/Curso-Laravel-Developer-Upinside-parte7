<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class checkParam
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $param, $param2)
    {
        //user está logado
        //attr que armazena
        //if(attr==param) ? next(request) : redirect(login)


        Log::info('Foi invocado o meu primeiro middleware! ['. $param .' - '. $param2 .']');
        Log::info('TESTE 1');

        $process = $next($request);

        LOG::info('TESTE 3');

        return $process;
    }
}
