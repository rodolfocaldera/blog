<?php

namespace App\Http\Controllers;
use App\Models\Entrada;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EntradaController extends Controller
{
    public function save(Request $request){
        $entrada = new Entrada;
        foreach($entrada->getFillable() as $field){
            $entrada->{$field} = $request->{$field};
        }
        $entrada->save();
        return response()->json([ 'success' => true,'message' => "Registro creado correctamente" ], Response::HTTP_CREATED);
    }

    public function get(Request $request){
        $entradas = DB::table('entrada')->select("id","titulo","autor",\DB::raw("SUBSTRING(contenido,1,70) as contenido"),"fecha_publicacion")->get();
       return response()->json([ 'success' => true,'entradas' => $entradas ], Response::HTTP_ACCEPTED); 
    }

    public function find(Request $request){
        $busqueda = $request->busqueda;
        $validator = Validator::make($request->query(), [
            'busqueda' => 'required|alpha'
        ]);

        if($validator->fails()){
            return response()->json([ 'message' =>  "Verifica que los datos ingresados tengan el formato correcto",'success' => false], Response::HTTP_NOT_FOUND); 
        }

        $entrada = Entrada::where("contenido",'LIKE','%'.$busqueda.'%')
            ->orWhere("autor",'LIKE','%'.$busqueda.'%')
            ->orWhere("titulo",'LIKE','%'.$busqueda.'%')
            ->select("id","titulo","autor","contenido","fecha_publicacion")
            ->get();
        return response()->json([ 'success' => true,'entradas' => $entrada ], Response::HTTP_ACCEPTED); 
    }

    public function select(Request $request,$id){
        $entrada = Entrada::where("id",$id)->select("id","titulo","autor","contenido","fecha_publicacion")->get();
        return response()->json([ 'success' => true,'entrada' => $entrada ], Response::HTTP_ACCEPTED); 
    }
}
