<?php

use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categorias', function () {
  $cats = DB::table('categorias')->get();
  foreach($cats as $c) {
    echo "id: " . $c->id . "; ";
    echo "nome: " . $c->nome . "<br>";
  }

  echo "<hr>";

  $nomes = DB::table('categorias')->pluck('nome'); //retorna tds os nomes
  foreach($nomes as $nome) {
    echo "$nome <br>";
  }

  echo "<hr>";

  $ids = DB::table('categorias')->pluck('id'); //retorna tds os id
  foreach($ids as $id) {
    echo "$id <br>";
  }

  echo "<hr>";

  $cats = DB::table('categorias')->where('id',1)->get();
  foreach($cats as $c) {
    echo "id: " . $c->id . "; ";
    echo "nome: " . $c->nome . "<br>";
  }

  echo "<hr>";

  $cats = DB::table('categorias')->where('id',1)->first(); //retorna 1 unico elemento. O primeiro que tenha id 1.
    echo "id: " . $cats->id . "; ";
    echo "nome: " . $cats->nome . "<br>";

    echo "<p>Retorna um array utilizando like</p>";
    $cats = DB::table('categorias')->where('nome','like','%p%')->get();
    foreach($cats as $c) {
      echo "id: " . $c->id . "; ";
      echo "nome: " . $c->nome . "<br>";
    }

    echo "<hr>";

    $cats = DB::table('categorias')->where('nome','like','p%')->get();
    foreach($cats as $c) {
      echo "id: " . $c->id . "; ";
      echo "nome: " . $c->nome . "<br>";
    }

    echo "<hr>";

    echo "<p>sentenças logicas</p>";
    $cats = DB::table('categorias')->where('id',1)->orWhere('id',2)->get();
    foreach($cats as $c) {
      echo "id: " . $c->id . "; ";
      echo "nome: " . $c->nome . "<br>";
    }

    echo "<p>intervalos</p>";
    $cats = DB::table('categorias')->whereBetween('id',[1,3])->get();
    foreach($cats as $c) {
      echo "id: " . $c->id . "; ";
      echo "nome: " . $c->nome . "<br>";
    }

    echo "<p>intervalos</p>";
    $cats = DB::table('categorias')->whereNotBetween('id',[1,3])->get();
    foreach($cats as $c) {
      echo "id: " . $c->id . "; ";
      echo "nome: " . $c->nome . "<br>";
    }

    echo "<p>intervalos</p>";
    $cats = DB::table('categorias')->whereIn('id',[1,3,4])->get();
    foreach($cats as $c) {
      echo "id: " . $c->id . "; ";
      echo "nome: " . $c->nome . "<br>";
    }

    echo "<p>intervalos</p>";
    $cats = DB::table('categorias')->whereNotIn('id',[1,3,4])->get();
    foreach($cats as $c) {
      echo "id: " . $c->id . "; ";
      echo "nome: " . $c->nome . "<br>";
    }

    echo "<p>intervalos</p>";
    $cats = DB::table('categorias')->where([
      ['id',1],
      ['nome','roupas']
    ])->get();
    foreach($cats as $c) {
      echo "id: " . $c->id . "; ";
      echo "nome: " . $c->nome . "<br>";
    }

    echo "<p>ordenar por nome</p>";
    $cats = DB::table('categorias')->orderBy('nome')->get();
    foreach($cats as $c) {
      echo "id: " . $c->id . "; ";
      echo "nome: " . $c->nome . "<br>";
    }

    echo "<p>ordenar por nome decrescente</p>";
    $cats = DB::table('categorias')->orderBy('nome','desc')->get();
    foreach($cats as $c) {
      echo "id: " . $c->id . "; ";
      echo "nome: " . $c->nome . "<br>";
    }
});

Route::get('/novascategorias', function() {
  $id = DB::table('categorias')->insertGetId(
    ['nome'=>'Carros']
  );

  echo "Novo ID = $id <br>";
});

Route::get('/actualizarcat', function() {
  $cats = DB::table('categorias')->where('id',1)->first();
    echo "<p>Antes da actualizaçao:</p>";
    echo "id: " . $cats->id . "; ";
    echo "nome: " . $cats->nome . "<br>";

  DB::table('categorias')->where('id',1)->update(['nome'=>'roupa infantil']);

  $cats = DB::table('categorias')->where('id',1)->first();
    echo "<p>ultima da actualizaçao:</p>";
    echo "id: " . $cats->id . "; ";
    echo "nome: " . $cats->nome . "<br>";
});

Route::get('/removercat', function() {
  echo "<p>Antes da remoçao:</p>";

  $cats = DB::table('categorias')->get();
  foreach($cats as $c) {
    echo "id: " . $c->id . "; ";
    echo "nome: " . $c->nome . "<br>";
  }

  //DB::table('categorias')->where('id',1)->delete();
  DB::table('categorias')->whereNotIn('id',[1,2,3,4,5,6])->delete();

  echo "<p>Depois da remoçao:</p>";
  $cats = DB::table('categorias')->get();
  foreach($cats as $c) {
    echo "id: " . $c->id . "; ";
    echo "nome: " . $c->nome . "<br>";
  }
});
