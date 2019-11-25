<?php

Route::get('/', function () {
    return view('pagina');
});

Route::get('/primeiraview', function() {
  return view('minhaview');
});

Route::get('/ola', function(){
  return view('minhaview')->with('nome','diana')->with('sobrenome','afg');
});

Route::get('/ola/{nome}/{sobrenome}', function($nome, $sobrenome){
  //opçao1:
  // return view('minhaview')->with('nome',$nome)->with('sobrenome',$sobrenome);  Isto é igual a :

  //opçao2:array associativo
  // $parametros = ['nome'=>$nome, 'sobrenome'=>$sobrenome];
  // return view('minhaview', $parametros);

  //opçao3:compact é uma funçao do php que cria sozinha uma array associativa
  // return view('minhaview', compact('nome','sobrenome'));
});

Route::get('/email/{mail}', function($email) { //este parametro tem de ser igual ao que está na view, neste caso $email aqui e lá.
  //chamar a class View e utilizar um metodo estatico 'exists'. Isto é uma funçao do laravel.
  if (View::exists('email')) {
    return view('email', compact('email')); //este email tem de ser igual ao q está no parametro, por isso é email
  } else {
    return view('error');
  }
});

Route::get('/viewzinha', function() {
  return view('filho');
});

Route::get('/produtos', 'ProdutoControlador@listar');

Route::get('/seccaoprodutos/{palavra}', 'ProdutoControlador@seccaoprodutos');

Route::get('/mostraropcoes', 'ProdutoControlador@mostrar_opcoes');

Route::get('/opcoes/{opcao}', 'ProdutoControlador@opcoes');

Route::get('/loop/for/{n}', 'ProdutoControlador@loopFor');

Route::get('/loop/foreach', 'ProdutoControlador@loopForeach');