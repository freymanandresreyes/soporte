<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\area_users;

class OrdenesController extends Controller
{
    public function index(Request $request){
        $user = $request->user()->id;
        $consulta = area_users::where('id_usuario',$user)->first();
        dd($consulta);
        return view('orden.index');
    }
}
