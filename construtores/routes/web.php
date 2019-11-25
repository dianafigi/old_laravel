<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('/nome', 'MeuControlador@getNome');

Route::get('/idade', 'MeuControlador@getIdade');

Route::get('/multiplicar/{n1}/{n2}', 'MeuControlador@multiplicar');

Route::get('/nomes/{id}', 'MeuControlador@getNomeByID');

Route::resource('/cliente', 'ClienteControlador'); //em combinaçao com criar um controlador --resource no cmd
//isto faz com q n tenha de ter 7 rotas(7 pq no controlador tenho 7 funçoes q fazem sentido corresponder a rotas/links diferentes), no cmd com route:list posso ver q me criou as 7 rotas

Route::post('/cliente/requisitar', 'ClienteControlador@requisitar');
