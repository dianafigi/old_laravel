<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteControlador extends Controller
{

  private $clientes = [
    ['id'=>1, 'nome'=>'diana'],
    ['id'=>2, 'nome'=>'joao'],
    ['id'=>3, 'nome'=>'luis'],
    ['id'=>4, 'nome'=>'ana']
  ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return "Lista de todos os clientes";

        //ou se quiser mostrar os guardados no array:
          // echo '<ol>';
          //   foreach($this->clientes as $c) {
          //     echo '<li>' .$c['nome']. '</li>';
          //   }
          // echo '</ol>';

        //ou se quiser mostrar os guardados no array atraves de view:
          $clientes = $this->clientes;
          return view('clientes.index', compact(['clientes']));     //o compact é funcao do php q passa tudo o q ta dentro do clientes para uma unica array
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "Formulario de registo";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $s = "Armazenar: ";
        $s .= "Nome: " . $request->input('nome') . " e ";
        $s .= "Idade: " . $request->input('idade');

        return response($s, 201); //antes tinha so return($s),  mas como ta agora o '201' é o codigo alterado q aparece na extension rest api
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $v = ["Mario", "Edson", "Roberto", "Jean"];
      if($id >= 0 && $id < count($v)) {
        return $v[$id];
      } else {
        return "não encontrado";
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "formulario para editar o cliente com id: " . $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $s = "Actualizar Client com id $id: ";
      $s .= "Nome: " . $request->input('nome') . " e ";
      $s .= "Idade: " . $request->input('idade');

      return response($s, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response("apagado cliente com id: $id", 200);
    }

    public function requisitar(Request $request) {
      echo "nome: " . $request->input('nome');
    }
}
