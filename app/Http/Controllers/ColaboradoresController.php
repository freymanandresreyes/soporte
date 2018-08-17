<?php

namespace App\Http\Controllers;

use App\colaboradores;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColaboradoresController extends Controller
{
    public function colaboradores(){
        $consulta_colaboradores=colaboradores::all();
        $consulta_colaboradores->each(function($consulta_colaboradores){
        $consulta_colaboradores->AreaUserColaboradores->AreaUserAreas;
        $consulta_colaboradores->AreaUserColaboradores->AreaUserUser;
        $consulta_colaboradores->UserColaboradores;
        });
        // dd($consulta_colaboradores);
        return view('colaboradores.colaboradores',compact('consulta_colaboradores'));
    }
}
