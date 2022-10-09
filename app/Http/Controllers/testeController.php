<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testeController extends Controller
{
    //TESTE
    public function teste(int $p1,int $p2) {
        //echo "A soma de $p1 + $p2 é: ".($p1+$p2);
        
        //Envio de parametros por array associativo
        //return view('site.teste',['p1'=>$p1,'p2'=>$p2]);

        //Envio de parametros pela função compact - Mais usado
        return view('site.teste',compact('p1','p2'));

        //Envio de parametros por With()
        //return view('site.teste')->with('p1',$p1)->with('p2',$p2);
    }
}
