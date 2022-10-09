<?php

namespace App\Http\Middleware;

use Closure;
use App\logAccess;

class logAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next )
    {
        //return $next($request);
        $ip=$request->server->get('REMOTE_ADDR');
        $rota=$request->getRequestUri();
        logAccess::create(['log'=>"IP $ip requisitou a rota $rota"]);
        //return Response('O middlware foi executado!');

        //return $next($request);
        $resposta=$next($request);

        $resposta->setStatusCode(201,"o status e o texto foram alterados!");

        //dd($resposta);

        return $resposta;
    }
}
