<?php

namespace App\Http\Controllers;

use App\colaboradores;
use App\area_users;
use App\user;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ColaboradoresController extends Controller
{
    public function colaboradores(Request $request){
        $user=$request->user()->id;
        $consulta_area_users=area_users::where('id_usuario',$user)->first();
        // dd($consulta_area_users['id']);
        if($consulta_area_users==null){
           return redirect('/')->with('info', 'TU NO TIENES NINGUN AREA BAJO TU RESPONSABILIDAD, !SI ERES UN LIDER PONTE EN CONTACTO CON EL ADMINISTRADOR¡'); 
        }
        $consulta_colaboradores=colaboradores::where('id_area_encargada',$consulta_area_users['id'])
                                             ->where('estado',1)
                                             ->get();
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

    public function crear_colaborador(Request $request){

    //crea un nuevo usuario en el sistema

    $reglas=[  'password' => 'required|min:8',
                'documento' => 'required|unique:users',
	             'email' => 'required|email|unique:users', ];
	 
    $mensajes=[  'password.min' => 'El password debe tener al menos 8 caracteres',
                 'documento.unique' => 'El numero de documento ya se encuentra registrado en la base de datos',
	             'email.unique' => 'El email ya se encuentra registrado en la base de datos', ];
	  
    $validator = Validator::make( $request->all(),$reglas,$mensajes );
    // dd($validator->fails());
	if( $validator->fails() ){
	  	// dd($validator->errors());
        return response()->json(view('mensajes.mensaje_error')->with("msj","...Existen errores...")
                                              ->withErrors($validator->errors())->render());                                    
	}

	$usuario=new User;
	$usuario->name=strtoupper( $request->nombres)." ".strtoupper($request->apellidos) ;
	$usuario->nombres=strtoupper( $request->nombres)  ;
    $usuario->apellidos=strtoupper( $request->apellidos)  ;
	$usuario->telefono=$request->telefono;
    $usuario->email=$request->email;
	$usuario->documento=$request->documento;    
    $usuario->password= bcrypt( $request->password);
    
    $user=$request->user()->id;
    $consulta_area_users=area_users::where('id_usuario',$user)->first();
    $consulta_colaborador=colaboradores::where('id_usuario',$id)->first();
        
            
    if($usuario->save() && $consulta_colaborador==null)
    {
            $id=$usuario->id;
            $nuevo=new colaboradores;
            $nuevo->id_area_encargada=$consulta_area_users['id'];
            $nuevo->id_usuario=$id;
            $nuevo->estado=1;
            $nuevo->save();
            return response()->json('1') ;
    }
    else
    {
        return response()->json(view("mensajes.mensaje_error")->with("msj","...Hubo un error al agregar ;...")->render());
    }

    }



    public function agregar_area_colaborador(Request $request){
        $id=$request->id;
        $user=$request->user()->id;
        $consulta_area_users=area_users::where('id_usuario',$user)->first();
        // dd($consulta_area_users['id']);
        $consulta_colaborador=colaboradores::where('id_usuario',$id)->first();
        if($consulta_colaborador==null){
            $nuevo=new colaboradores;
            $nuevo->id_area_encargada=$consulta_area_users['id'];
            $nuevo->id_usuario=$id;
            $nuevo->estado=1;
            $nuevo->save();
            return response()->json($nuevo);
        }
        else{
            $consulta_colaborador['id_area_encargada']=$consulta_area_users['id'];
            $consulta_colaborador['estado']=1;
            $consulta_colaborador->save();
            return response()->json($consulta_colaborador);
        }
    }


    public function estado_colaborador(Request $request){
        $id_colaborador=$request->id_colaborador;
        $consulta_colaborador=colaboradores::where('id_usuario',$id_colaborador)->first();
        if($consulta_colaborador['estado']==1){
            $consulta_colaborador['estado']=2;
            $consulta_colaborador->save();
            return response()->json($consulta_colaborador);
        }elseif($consulta_colaborador['estado']==2){
            $consulta_colaborador['estado']=1;
            $consulta_colaborador->save();
            return response()->json($consulta_colaborador);
        }else{
            return response()->json(1);
        }
    }
}
