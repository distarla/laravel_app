<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class loginController extends Controller
{
    public function index(Request $request) {
        $erro = '';

        if ($request->get('erro')==1)
            $erro = "Dados incorretos. Tente novamente";
    
        if ($request->get('erro')==2)
            $erro = "Tem de fazer o login";

        return view('site.login',['titulo'=>'Login','erro'=>$erro]);
    }

    public function autenticar(Request $request) {
        //return "Autenticado";

        //Regras de validação
        $regras=[
            'utilizador'=>'email',
            'senha'=>'required'
        ];

        //Mensagens de feedback de validação
        $feedback=[
            'utilizador.email'=>'Tem de indicar um email válido no utilizador',
            'senha.required'=>'Tem de indicar a password'
        ];

        $request->validate($regras,$feedback);

        $email=$request->get('utilizador');
        $password=$request->get('senha');

        //Iniciar o Model User
        $user=new User();

        $utilizador=$user->where('email',$email)->where('password',$password)->get()->first();

        //print_r($utilizador);

        if (isset($utilizador->name)) {
            //echo "O utilizador existe!";
            session_start();
            $_SESSION['nome']=$utilizador->name;
            $_SESSION['email']=$utilizador->email;

            return redirect()->route('app.clientes');
        }
            
        else
            //echo "O utilizador não existe!";
            return redirect()->route('site.login',['erro'=>1]);
    }

    public function sair() {
        session_destroy();
        return redirect()->route('site.index');
    }
}
