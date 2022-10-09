<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\siteContacto;
use App\motivo;

class contactsController extends Controller
{
    //CONTACTS
    public function contacts(Request $request) {
        //echo "Contacts com Controller!";
        //var_dump($_POST);
        //dd($request);
        /* echo "<pre>";
        print_r($request->all());
        echo "</pre>";
        echo $request->input('nome');
        echo "<br>";
        echo $request->input('email'); */
        /* $contacto=new siteContacto();
        $contacto->nome=$request->input('nome');
        $contacto->telefone=$request->input('telefone');
        $contacto->email=$request->input('email');
        $contacto->motivo=$request->input('motivo');
        $contacto->mensagem=$request->input('mensagem');
        $contacto->save(); */
        //$contacto=new siteContacto();
        //siteContacto::create($request->all());

        $titulo = "Contactos";
        /* $motivos=[
            '1'=>'Dúvida',
            '2'=>'Elogio',
            '3'=>'Reclamação',
            '4'=>'Gritar'
        ]; */
        $motivos=motivo::all();
        return view('site.contacts',compact('titulo','motivos'));
    }

    public function guardar(Request $request) {

        //executar a validação
        $request->validate([
            'nome'=>'required|min:3|max:40', //minimo de 3 caracteres e maximo de 40
            'telefone'=>'required',
            'email'=>'email',
            'motivo_id'=>'required',
            'mensagem'=>'required|max:2000'
        ],[
            'email.email'=>"O email indicado não é válido"
        ]);

        siteContacto::create($request->all());

        return redirect()->route('site.index');

        //$titulo = "Contactos";
        //return view('site.contacts',compact('titulo'));
    }
}
