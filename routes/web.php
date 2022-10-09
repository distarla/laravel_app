<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\logAccessMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    //return view('welcome');
    return 'Bem-vindos à app LARAVEL';
}); */
Route::get('/','homeController@home')->name('site.index');

/* Route::get('/aboutus', function () {
    return 'ABOUT US';
}); */
Route::get('/aboutus','aboutusController@aboutus')->name('site.aboutus');

/* Route::get('/contacts', function () {
    return 'CONTACTS';
}); */
Route::get('/contacts','contactsController@contacts')->name('site.contacts');
Route::post('/contacts','contactsController@guardar')->name('site.contacts');

/* Route::get('/contacts/{nome}/{assunto}/{mensagem?}', function (string $nome, string  $assunto, string $mensagem = "Sem mensagem") {
    echo "Nome: $nome<br>Assunto: $assunto<br>Mensagem: $mensagem";
}); */

/* Route::get('contacts/{nome}/{assunto}/{categoriaID}/{mensagem}',function (string $nome,string $assunto,int $categoriaIdD=1,string $mensagem='Sem mensagem') {
    echo "Nome: $nome<br>Assunto: $assunto<br>Categoria: $categoriaIdD<br>Mensagem: $mensagem";
})->where('categoriaID','[0-9]+')->where('nome','[A-Za-z]+')->where('assunto','[A-Za-z]+'); */

Route::get('/login/{erro?}','loginController@index')->name('site.login');
Route::post('/login','loginController@autenticar')->name('site.login');

Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function() {
    Route::get('/clientes',function() {return 'Clientes'; })->name('app.clientes');
    Route::get('/fornecedores','fornecedorController@index')->name('app.fornecedores');
    Route::get('/produtos',function() {return 'Produtos'; })->name('app.produtos');
    Route::get('/sair','loginController@sair')->name('app.sair');
});

Route::get('/rota1',function() {
    return 'Rota 1'; 
})->name('site.rota1');

// Redirecionamento - método 1
//Route::redirect('rota2','rota1');

//Redirecionamento - Método 2
Route::get('/rota2',function() {
    return redirect()->route('site.rota1'); 
})->name('site.rota2');

Route::fallback(function() {
    echo "A rota indicada não existe! Clique <a href='".route('site.index')."'>aqui</a> para voltar à página inicial.";
});

//Enviar parametros para o controller
Route::get('/teste/{p1}/{p2}','testeController@teste')->name('teste');

