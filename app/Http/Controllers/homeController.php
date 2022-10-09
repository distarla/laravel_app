<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\motivo;

class homeController extends Controller
{
    //HOME
    public function home() {
        //echo "Bem-vindos ao LARAVEL com Controller!";
        /* $motivos=[
            '1'=>'Dúvida',
            '2'=>'Elogio',
            '3'=>'Reclamação',
            '4'=>'Gritar'
        ]; */
        $motivos=motivo::all();
        return view('site.home',compact('motivos'));
    }
}
