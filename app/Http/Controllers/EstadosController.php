<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Estados;

class EstadosController extends Controller
{
    public function nuevo_estado(Request $request)
    {
        $nuevo_estado=$request->nuevo_estado;
        $consulta=estados::all();
        $conteo=0;
        if($consulta=='[]')
        {
        $nuevo=new estados;
        $nuevo->nombre_estado=$nuevo_estado;
        $nuevo->save();
        $respuesta=1;
        return response()->json($respuesta);
        }
        else
        {
            for ($i = 0; $i <= (count($consulta))-1; $i++) {
                if($consulta[$i]['nombre_estado']==$nuevo_estado)
                {
                    $conteo=$consulta[$i]['nombre_estado'];
                }
              }
              $var=(strlen($conteo));

          if($var==1)
            { 
                    $nuevo=new estados;
                    $nuevo->nombre_estado=$nuevo_estado;
                    $nuevo->save();
                    $respuesta=1;
                    return response()->json($respuesta);
            }
            elseif($var!=0)
            {
                $respuesta=0;
                return response()->json($respuesta);
            }
        }
    }



    public function listar_estados()
    {
        $consulta_estados=estados::all();
        return response()->json(view('estados.estados_listar', compact('consulta_estados'))->render());
    }



    public function llenar_input(Request $request)
    {
        $estado=$request->estado;
        $consulta=estados::where('id',$estado)->get();
        
        if($consulta=='[]')
        {
        return response()->json(view('estados.input_vacio')->render());
        }
        else
        {
        return response()->json(view('estados.input', compact('consulta'))->render());
        }
    }


    public function guardar_editar_estado(Request $request)
    {
        $conteo=0;
        $nuevo_estado=$request->editar_estado;
        $id_estado=$request->id_estado;
        $consulta=estados::all();

          for ($i = 0; $i <= (count($consulta))-1; $i++) 
          {
            if($consulta[$i]['nombre_estado']==$nuevo_estado)
            {
                $conteo=$consulta[$i]['nombre_estado'];
            }
          }

        $var=(strlen($conteo));

          if($var==1)
            { 
                $consulta_estado=estados::find($id_estado);
                $consulta_estado->nombre_estado=$nuevo_estado;
                $consulta_estado->save();     
                $respuesta=1;
                return response()->json($respuesta);
            }
            elseif($var!=0)
            {
                $respuesta=0;
                return response()->json($respuesta);
            }
    }
}
