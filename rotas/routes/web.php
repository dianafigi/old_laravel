<?php

use Illuminate\Http\Request;

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

Route::get('/', function () {  //Route é Class
    return "bla 1";
});

Route::get('/hey', function () {
  return "hey there";
});

Route::get('/hey/yellow', function () {
  return "yellowwwwwwwwww";
});

Route::get('/nome/{nome}/{maisum}', function ($nome, $oi) {
  return "<h1>Olá, $nome $oi!</h1>";
});

Route::get('/repetir/{nome}/{n}', function ($nome, $n) {
  //sem o if, se colocar '5' ele corre 5 vezes, se colocar 'cinco' nao faz nada
  //o {n} é sempre visto como string, logo com o if tendo '5' ou 'cinco' vai sempre parar ao else
  if (is_integer($n)) {
    for($i=0; $i<$n; $i++) {
      echo "<h1>Olá, $nome!</h1>";
    }
  }
  else
    echo "Não digitou um inteiro";
});

Route::get('/comregra/{nome}/{maisum}', function ($nome, $n) {
  for($i=0; $i<$n; $i++) {
    echo "<h1>Olá, $nome!</h1>";
  }
})->where('n','[0-9]+')->where('nome','[A-Za-z]+'); //restrições

Route::get('/semregra/{nome?}', function ($nome=null) {  //com o '?' de fino o parametro como opcional. Entao tenho de definir tambem -> como null por defeito
  if(isset($nome)) { //verifico se foi inserido parametro
    echo "<h1>Olá, $nome!</h1>";
  }
  else {
    echo "não passei nome";
  }
});


//HIERARQUIAS
Route::prefix('app')->group(function() {
  Route::get("/", function() {
    return "págia principal";
  });
  Route::get("profile", function() {
    return "págia profile";
  });
  Route::get("about", function() {
    return "págia about ";
  });
});


//REDIRECCIONAR
Route::redirect('/aqui', '/hey', 301); //redirecciona a pagina 'aqui' para  a 'hey' e o 301 é codigo de retorno http q informa que 'aqui' está agora em 'hey'


//MOTRAR UMA VIEW
Route::get('/hello', function () { //OU Route::view('/rota', 'hello');   -> '/rota' é a rota que leva áquela view e 'hello' é o nome da view, vem de 'hello.blade.php'
  return view("hello");
});


//PASSAR OS PARAMETROS DA VIEW PARA A ROTA
Route::view('/viewnome', 'hellonome',
  ['nome'=>'Ze', 'sobrenome'=>'Manel']); //array associativo

Route::get('/hellonome/{nome}/{sobrenome}', function ($nome, $sn) {
  return view("hellonome",
    ['nome'=>$nome,
      'sobrenome'=>$sn]);
});


//METODOS HTTP
Route::get('/rest/hello', function () { //passar parametros, obter
  return "Hello metodo get";
});

Route::post('/rest/hello', function () { //criar novo
  return "Hello metodo post";
});

Route::delete('/rest/hello', function () { //apagar
  return "Hello metodo delete";
});

Route::put('/rest/hello', function () { //editar
  return "Hello metodo put";
});

Route::patch('/rest/hello', function () {
  return "Hello metodo patch";
});

Route::options('/rest/hello', function () {
  return "Hello metodo options";
});

Route::post('/rest/imprimir', function (Request $req) {
  $nome = $req->input('nome'); //'nome' é o nome do campo na extensao, $nome é o nome q dei dentro da funçao para poder chamar no return.
  $idade = $req->input('idade');//input serve para obter o valor que demos ao nome na extensao, 'diana'
  //Usar isto em conjunto com 'use Illuminate\Http\Request;' de lá em cima
  //Usar isto em conjunto com ficheiro: app/http/middleware/VerifCsrfToken.php e adicionar lá a excepçao
  return "Hello $nome com a idade $idade";
});


//AGRUPAR VARIOS METODOS
Route::match(['get','post'],'/rest/hello2', function() { //lê metodo get e post
  return "Hello World 2";
});

Route::any('/rest/hello3', function() { //lê qq metodo
  return "Hello World 3";
});


//NOMEAR ROTAS  ->util se alguem mudar a rota, se se estiver a utilizar o nome, a rota vai funcionar sempre
Route::get('/produtos', function() {
  echo "<h1>Produtos</h1>";
  echo "<ol>";
  echo "<li>Notebook</li>";
  echo "<li>Mouse</li>";
  echo "<li>Impressora</li>";
  echo "</ol>";
})->name('meusprodutos');

Route::get('/linkprodutos', function() {
  $url = route('meusprodutos'); //é como chamo a rota pelo nome
  echo "<a href=\"" . $url . "\">Meus produtos</a>";
});

Route::get("/redirectprodutos", function() {
  return redirect()->route('meusprodutos'); //redirect() é um helper do proprio laravel
});