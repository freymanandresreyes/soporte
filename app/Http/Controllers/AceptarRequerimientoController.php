<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\colaboradores;
use App\area_users;
use App\Areas;
use App\Ordenes;
use App\Items;
use App\Orden_Item;
use App\Estados;
use DB;
class AceptarRequerimientoController extends Controller
{
    public function aceptar_requerimiento(Request $request){
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
                                // ->where('id_estado',3)
                                // ->where('id_estado',4)
                                ->get();
        $consulta_orden->each(function($consulta_orden){
        $consulta_orden->idAreaSolicita->areaAreauser;
        $consulta_orden->idAreaDestino->areaAreauser;
        // $consulta_orden->AreaUserColaboradores->AreaUserUser;
        // $consulta_orden->UserColaboradores;
        });
        $consulta_estados=estados::where('id',4)
                                 ->orwhere('id',5)
                                 ->orwhere('id',6)->pluck('nombre','id');
        // dd($consulta_estados);
        return view('aceptar_requerimiento.aceptar_requerimiento',compact('consulta_orden','consulta_estados'));
    }


    public function ver_orden(Request $request){
        $id_orden=$request->id_orden;
        $consulta_orden=ordenes::where('id',$id_orden)->get();
        $consulta_orden->each(function($consulta_orden){
        $consulta_orden->idAreaSolicita->areaAreauser;
        $consulta_orden->idAreaDestino->areaAreauser;
        $consulta_orden->idOrden->ordenItems;
        // $consulta_orden->itemsOrdenItems;
        // $consulta_orden->UserColaboradores;
        });

        // dd($consulta_orden[0]['id']);

        $consulta_items=orden_item::where('id_orden',$consulta_orden[0]['id'])->get();
        $consulta_items->each(function($consulta_items){
        $consulta_items->ordenItems;
        });
        // dd($consulta_items);
        return response()->json([$consulta_orden,$consulta_items]);
    }


    public function items_modal(Request $request){
        $id_orden=$request->id_orden;
        $consulta_items=orden_item::where('id_orden',$id_orden)->get();
        $consulta_items->each(function($consulta_items){
        $consulta_items->ordenItems;
        });
        return response()->json(view('aceptar_requerimiento.parciales.items', compact('consulta_items'))->render());
    }

    public function aceptar_orden(Request $request){
        $id=$request->id;
        $id_orden=$request->id_orden;

        if($id=='REMISION'){
        $consulta_estados=estados::where('nombre',$id)->first();
       
        $ordenes=ordenes::find($id_orden);
        $ordenes->id_estado=$consulta_estados->id;
        $ordenes->id_area_destino=$nueva_area_destino;
        $ordenes->save();

        $orden_items=orden_item::where('id_orden',$id_orden)->get();
        for ($i=0;$i<count($orden_items);$i++)
          {
              $orden_items[$i]->id_estado=$consulta_estados->id;
              $orden_items[$i]->save();
          }
        }
        else {
        $consulta_estados=estados::where('nombre',$id)->first();
       
        $ordenes=ordenes::find($id_orden);
        $ordenes->id_estado=$consulta_estados->id;
        $ordenes->save();

        $orden_items=orden_item::where('id_orden',$id_orden)->get();
        for ($i=0;$i<count($orden_items);$i++)
          {
              $orden_items[$i]->id_estado=$consulta_estados->id;
              $orden_items[$i]->save();
          }
        }

        
        // dd($orden_items[0]);
    }
}
