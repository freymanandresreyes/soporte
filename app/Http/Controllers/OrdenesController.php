<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\area_users;
use App\Areas;

class OrdenesController extends Controller
{
    public function index(Request $request){
        $areas = Areas::all();
        $user = $request->user()->id;
        $consulta = area_users::where('id_usuario',$user)->first();
        $consulta->areaAreauser;
        $consulta->userAreauser;
        // dd($consulta);
        return view('orden.index', compact('consulta', 'areas'));
    }
}
