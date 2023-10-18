<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ValidarEntradas
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|alpha',
            'autor' => 'required|alpha',
            'fecha_publicacion' => 'required|date',
            'contenido' => 'required|alpha'
        ]);

        if($validator->fails()){
            return response()->json([ 'message' =>  "Verifica que los datos ingresados tengan el formato correcto",'success' => false], Response::HTTP_NOT_FOUND); 
        }
        return $next($request);
    }
}
