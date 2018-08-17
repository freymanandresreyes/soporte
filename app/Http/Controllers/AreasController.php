<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Areas;

class AreasController extends Controller
{
    public function areas()
    {
        $consulta_users=user::all();
        $consulta_areas=Areas::all();
        $consulta_areas->each(function($consulta_areas){
        $consulta_areas->userArea;
        });
        return view('areas.areas',compact('consulta_users','consulta_areas'));
    }

    public function crear_area(Request $request)
    {
        $area=$request->area;
        $lider=$request->lider;
        
        $consulta_area_user=user::find($lider);
        if($consulta_area_user->id_area!=null)
        {
            $respuesta=0;
            return response()->json($respuesta);
        }
        else
        {
            $nueva_area=new areas;
            $nueva_area->nombre_area=$area;
            $nueva_area->id_user=$lider;
            $nueva_area->save();
            $id_area=$nueva_area->id;

            
            $consulta_user_area=User::find($lider);
            $consulta_user_area->id_area=$id_area;
            $consulta_user_area->save();

            $respuesta=1;
            return response()->json($respuesta);
        }
    }

    public function editar_area(Request $request)
    {
        $id=$request->id;
        $consulta_area=Areas::find($id);
        $id_user=$consulta_area->id_user;
        $consulta_user=User::all();
        // dd($consulta_area,$consulta_user);
        return response()->json(view('areas.parciales.editar_area', compact('consulta_area','consulta_user'))->render());
    }

// ºººººººººººººººººººººººººººººº*********************************
// ºººººººººººººººººººººººººººººº*********************************
                     // EDITAR AREA
// ºººººººººººººººººººººººººººººº*********************************
// ºººººººººººººººººººººººººººººº*********************************
    public function guardar_editar(Request $request)
    {
        $nombre_area=$request->nombre_area;
        $encargado=$request->encargado;
        $nuevo_nombre=$request->nuevo_nombre;
        
        $consulta_area_user=user::find($encargado);

        $consulta_user_area=areas::find($nombre_area);
        
        if($consulta_area_user->id_area==null && $consulta_user_area->id_user==null)
        {
            $consulta_area_user->id_area=$nombre_area;
            $consulta_user_area->nombre_area=$nuevo_nombre;
            $consulta_user_area->id_user=$encargado;
            $consulta_area_user->save();
            $consulta_user_area->save();
            $respuesta=1;
            return response()->json($respuesta);
        }
        if($consulta_area_user->id_area==$nombre_area)
        {
            $consulta_user_area->nombre_area=$nuevo_nombre;   
            $consulta_user_area->save();
            $respuesta=1;
            return response()->json($respuesta);
        }
        if($consulta_area_user->id_area!=$nombre_area && $consulta_area_user->id_area!=null)
        {
            $respuesta=0;
            return response()->json($respuesta);
        }
    }

// ºººººººººººººººººººººººººººººº*********************************
// ºººººººººººººººººººººººººººººº*********************************
            // BUSCAR AREA DE UN LIDER PARA QUITARSELA
// ºººººººººººººººººººººººººººººº*********************************
// ºººººººººººººººººººººººººººººº*********************************
    public function buscar_area_lider(Request $request)
    {
        $lider_area=$request->lider_area;
        $consulta_area=areas::where('id_user',$lider_area)->get();
        if($lider_area==0 )
        {
            $respuesta="";
            return response()->json($respuesta);
        }
        elseif($consulta_area=='[]')
        {
            $respuesta="";
            return response()->json($respuesta);
        }
        else
        {
            $consulta_area=areas::where('id_user',$lider_area)->get();
            return response()->json(view('areas.parciales.area_quitar', compact('consulta_area'))->render());
        }
    }

// ºººººººººººººººººººººººººººººº*********************************
// ºººººººººººººººººººººººººººººº*********************************
            // QUITAR AREA A UN LIDER
// ºººººººººººººººººººººººººººººº*********************************
// ºººººººººººººººººººººººººººººº*********************************
    public function quitar_area(Request $request)
    {
        $id_area=$request->id_area;
        $lider_area=$request->lider_area;
        $consulta_area=areas::find($id_area);
        $consulta_user=user::find($lider_area);

        $consulta_area->id_user=null;
        $consulta_user->id_area=null;
        $consulta_area->save();
        $consulta_user->save();
        $respuesta=1;
        return response()->json($respuesta);
    }
}
