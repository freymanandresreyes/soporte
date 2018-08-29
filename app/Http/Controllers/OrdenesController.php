<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\area_users;
use App\Areas;
use App\Ordenes;
use App\Items;
use App\Orden_Item;
use App\Designados;
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
            ->select('users.id as id_user', 'users.nombres AS nombres', 'users.apellidos AS apellidos', 'users.email AS email', 'users.documento as documento', 'users.telefono as telefono' ,'area_users.id as id_area_encargada', 'areas.nombre as nombre_area', 'areas.id as id_area')
            ->join('area_users', 'users.id', '=', 'area_users.id_usuario')
            ->join('areas', 'area_users.id_area', '=', 'areas.id')
            ->where('users.id',$user)
            ->get();
        $areas=areas::all();
        // dd($consulta[0]);
        return view('orden.index', compact('consulta', 'areas'));
    }


    public function guardar_orden(Request $request){

        $id_area_enviada=$request->id_area_enviada;
        $id_area_encargada=$request->id_area_encargada;
        $data=$request->data;
        $consulta_consecutivo=ordenes::all()->last();
        $nueva_orden=new ordenes;
        $nueva_orden->consecutivo=$consulta_consecutivo['consecutivo']+1;
        $nueva_orden->id_area_solicita=$id_area_encargada;
        $nueva_orden->id_area_destino=$id_area_enviada;
        $nueva_orden->id_estado=3;
        $nueva_orden->save();
        $id_orden=$nueva_orden->id;
        for ($i=0; $i < count($data) ; $i++) {
            
            $nuevo_item=new items;
            $nuevo_item->descripcion=$data[$i][0];
            $nuevo_item->save();
            $id_item=$nuevo_item->id;

            $nueva_orden_items=new orden_item;
            $nueva_orden_items->id_orden=$id_orden;
            $nueva_orden_items->id_item=$id_item;
            $nueva_orden_items->id_estado=3;
            $nueva_orden_items->save();
            $id_nueva_orden_items=$nueva_orden_items->id;

            $nuevo_designados=new designados;
            $nuevo_designados->id_orden_item=$id_nueva_orden_items;
            $nuevo_designados->id_estado=9;
            $nuevo_designados->save();
        }
        return response()->json($nueva_orden_items);
    }
}
