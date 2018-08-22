<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\area_users;
use App\Areas;
use DB;

class OrdenesController extends Controller
{
    public function index(Request $request){
        $user=$request->user()->id;
        $consulta_area_users=area_users::where('id_usuario',$user)->first();
        if($consulta_area_users==null){
           return redirect('/')->with('info', 'TU NO TIENES NINGUN AREA BAJO TU RESPONSABILIDAD, !SI ERES UN LIDER PONTE EN CONTACTO CON EL ADMINISTRADOR¡'); 
        }
        $consulta=DB::table('users')
            ->select('users.id as id_user', 'users.nombres AS nombres', 'users.apellidos AS apellidos', 'users.email AS email', 'area_users.id as id_area_encargada', 'areas.nombre as nombre_area')
            ->join('area_users', 'users.id', '=', 'area_users.id_usuario')
            ->join('areas', 'area_users.id_area', '=', 'areas.id')
            ->where('users.id',$user)
            ->get();
        $areas=areas::all();
        // dd($consulta[0]);
        return view('orden.index', compact('consulta', 'areas'));
    }
}
