<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\colaboradores;
use App\area_users;
use App\user;
use App\ordenes;
use App\estados;
use DB;

class DesignadosController extends Controller
{
    public function designados(Request $request){
        $user=$request->user()->id;
        $consulta_area_users=area_users::where('id_usuario',$user)->first();
        // dd($consulta_area_users['id']);
        if($consulta_area_users==null){
           return redirect('/')->with('info', 'TU NO TIENES NINGUN AREA BAJO TU RESPONSABILIDAD, !SI ERES UN LIDER PONTE EN CONTACTO CON EL ADMINISTRADOR¡'); 
        }
        $consulta=DB::table('users')
            ->select('area_users.id as id_area_encargada')
            ->join('area_users', 'users.id', '=', 'area_users.id_usuario')
            ->join('areas', 'area_users.id_area', '=', 'areas.id')
            ->where('users.id',$user)
            ->get();
            // dd($consulta[0]->id_area_encargada);
        $consulta_orden=Ordenes::where('ordenes.id_area_destino',$consulta[0]->id_area_encargada)
                                ->where('id_estado',5)
                                ->orwhere('id_estado',4)
                                ->get();
        $consulta_orden->each(function($consulta_orden){
        $consulta_orden->idAreaSolicita->areaAreauser;
        $consulta_orden->idAreaDestino->areaAreauser;
        // $consulta_orden->AreaUserColaboradores->AreaUserUser;
        // $consulta_orden->UserColaboradores;
        });
        
        
            // dd($consulta2[0]->id_area_user);
        return view('designados.designados',compact('consulta_orden'));
    }
}
