<?php

namespace App\Http\Controllers;

use App\colaboradores;
use App\area_users;
use App\user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ColaboradoresController extends Controller
{
    public function colaboradores(Request $request){
        $user=$request->user()->id;
        $consulta_area_users=area_users::where('id_usuario',$user)->first();
        // dd($consulta_area_users['id']);
        $consulta_colaboradores=colaboradores::where('id_area_encargada',$consulta_area_users['id'])->get();
        // dd($consulta_colaboradores);
        $consulta_colaboradores->each(function($consulta_colaboradores){
        $consulta_colaboradores->AreaUserColaboradores->AreaUserAreas;
        $consulta_colaboradores->AreaUserColaboradores->AreaUserUser;
        $consulta_colaboradores->UserColaboradores;
        });
        return view('colaboradores.colaboradores',compact('consulta_colaboradores'));
    }

    public function buscar_colaborador(Request $request){
        $documento=$request->documento;
        $busqueda_user=user::where('documento',$documento)->first();
        if($busqueda_user==null){
            $respuesta='null';
            // cuando no existe ese usuario en el sistema
            return response()->json($respuesta);
        }else{
        $consulta=DB::table('area_users')
            ->select('area_users.id AS id_area_user', 'areas.nombre AS area_nombre', 'colaboradores.id AS id_colaborador')
            ->join('areas', 'area_users.id_area', '=', 'areas.id')
            ->join('colaboradores', 'area_users.id', '=', 'colaboradores.id_area_encargada')
            ->where('colaboradores.id_usuario',$busqueda_user['id'])
            ->where('colaboradores.estado',1)
            ->get();
        if(count($consulta)>0){
            // cuando el colaborador esta asignado a una area
            return response()->json([$busqueda_user,$consulta]);
        }if(count($consulta)==0){
            // cuando el usuario existe pero no tiene un area
            return response()->json([$busqueda_user,'null']);
        }
      }
    }
}
