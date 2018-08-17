<?php

namespace App\Http\Controllers;

use App\colaboradores;
use App\area_users;
use App\user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        if($busqueda_user!=null){
            return Response(1);
        }else{
            return Response(2);
        }
    }
}
