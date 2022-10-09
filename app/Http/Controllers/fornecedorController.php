<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class fornecedorController extends Controller
{
    //
    public function index() {
        //$fornecedores=['Fornecedor 1','Fornecedor 2'];
        $fornecedores=[
            0 => [
                'nome' => 'Fornecedor 1',
                'distrito' => '13'
            ],
            1 => [
                'nome' => 'Fornecedor 2',
                'distrito' => '2'
                ]
        ];

        $msg = isset($fornecedores[2]) ? "Existe a posição 2." : "Não existe a posição 2";
        //echo $msg;

        return view('app.fornecedor.index',compact('fornecedores','msg'));
    }
}
