<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\colaboradores;
use App\area_users;
use App\user;
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
    }
}
