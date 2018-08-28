<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\colaboradores;
use App\area_users;
use App\user;
use App\ordenes;
use App\estados;
use App\Items;
use App\Orden_Item;
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
        $consulta_orden->idOrden;
        // $consulta_orden->AreaUserColaboradores->AreaUserUser;
        // $consulta_orden->UserColaboradores;
        });
        // dd($consulta_orden);
        return view('designados.designados',compact('consulta_orden'));
    }


    public function asignar_item(Request $request){
        $id_orden=$request->id_orden;
        $consulta=DB::table('orden_items')
            ->select('orden_items.id as id_orden','orden_items.observacion as observacion_orden_items','items.id as id_item','items.descripcion as descripcion_items','estados.nombre as nombre_estado')
            ->join('ordenes', 'orden_items.id_orden', '=', 'ordenes.id')
            ->join('items', 'orden_items.id_item', '=', 'items.id')
            ->join('designados', 'orden_items.id', '=', 'designados.id_orden_item')
            ->join('estados', 'designados.id_estado', '=', 'estados.id')
            ->where('orden_items.id_orden',$id_orden)
            ->get();
        // dd($consulta);
        $user=$request->user()->id;
        $consulta_area_users=area_users::where('id_usuario',$user)->first();
        // dd($consulta_area_users['id']);
        $consulta2=DB::table('colaboradores')   
            ->select('users.id AS id', 'users.name AS nombre')
            ->join('users', 'colaboradores.id_usuario', '=', 'users.id')
            ->where('colaboradores.id_area_encargada',$consulta_area_users['id'])
            ->get();
        // dd($consulta2);
        return response()->json(view('designados.parciales.cuerpo_tabla', compact('consulta','consulta2'))->render());   
    }
}




// SELECT orden_items.id as id_orden, orden_items.observacion as observacion_orden_items, items.id as id_item, items.descripcion as descripcion_items, estados.nombre as nombre_estado FROM orden_items
// INNER JOIN ordenes ON orden_items.id_orden = ordenes.id
// INNER JOIN items ON orden_items.id_item = items.id
// INNER JOIN designados ON orden_items.id = designados.id_orden_item
// INNER JOIN estados ON designados.id_estado = estados.id
// WHERE orden_items.id_orden = 1