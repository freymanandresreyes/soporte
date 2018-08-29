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
use App\Designados;
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
        // dd($consulta);
        return response()->json(view('designados.parciales.cuerpo_tabla', compact('consulta','consulta2','id_orden'))->render());   
    }


    public function guardar_colaborador_asignado(Request $request){
        $id_orden=$request->id_orden;
        $id_item=$request->id_item;
        // dd($id_item);
        $observacion=$request->observacion;
        $select=$request->select;
        $buscar_id_orden_item=Orden_Item::where('id_item',$id_item)->first();
        // dd($buscar_id_orden_item);
        $designados=designados::find($buscar_id_orden_item->id);
        $designados->id_colaborador=$select;
        $designados->observacion=$observacion;
        $designados->id_estado=10;
        $designados->save();
        // dd($designados);
        return response()->json($designados);
    }


    public function ver_items(Request $request){
        $user=$request->user()->id;
        $consulta=DB::table('designados')   
            ->select('users.id AS id_usuraio', 'users.name AS nombre_usuario', 'designados.observacion AS observacion_designados'
                    , 'items.descripcion AS items_descripcion', 'items.id AS id_item' ,'ordenes.consecutivo AS consecutivo_orden', 'ordenes.id AS id_orden'
                    , 'estados.nombre AS nombre_estado', 'areas.nombre AS nombre_area')
            ->join('users', 'designados.id_colaborador', '=', 'users.id')
            ->join('orden_items', 'designados.id_orden_item', '=', 'orden_items.id')
            ->join('items', 'orden_items.id_item', '=', 'items.id')
            ->join('ordenes', 'orden_items.id_orden', '=', 'ordenes.id')
            ->join('estados', 'designados.id_estado', '=', 'estados.id')
            ->join('area_users', 'ordenes.id_area_solicita', '=', 'area_users.id')
            ->join('areas', 'area_users.id_area', '=', 'areas.id')
            ->where('designados.id_colaborador',$user)
            ->get();
            // dd($consulta);
        return view('designados.ver_items',compact('consulta'));
    }


    public function cambiar_estado_item(Request $request)
    {
        dd($request->id_item);
    }
}




// SELECT orden_items.id as id_orden, orden_items.observacion as observacion_orden_items, items.id as id_item, items.descripcion as descripcion_items, estados.nombre as nombre_estado FROM orden_items
// INNER JOIN ordenes ON orden_items.id_orden = ordenes.id
// INNER JOIN items ON orden_items.id_item = items.id
// INNER JOIN designados ON orden_items.id = designados.id_orden_item
// INNER JOIN estados ON designados.id_estado = estados.id
// WHERE orden_items.id_orden = 1