<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoControlador extends Controller
{
    public function listar() {
      $produtos = [
        "Notebook",
        "Mouse e Teclado",
        "Monitor",
        "Impressora",
        "Disco"
      ];
      return view('produtos', compact('produtos'));
    }

    public function seccaoprodutos($palavra) {
      return view('seccao_produtos', compact('palavra'));
    }

    public function mostrar_opcoes() {
      return view('mostrar_opcoes');
    }

    public function opcoes($opcao) {
      return view('opcoes', compact('opcao'));
    }

    public function loopFor($n) {
      return view('loop_for', compact('n'));
    }

    public function loopForeach() {
      $produtos = [
        ["id"=>1, "nome"=>"computador"],
        ["id"=>2, "nome"=>"rato"],
        ["id"=>3, "nome"=>"impressora"],
        ["id"=>4, "nome"=>"monitor"],
        ["id"=>5, "nome"=>"teclado"],
      ];
      return view('loop_foreach', compact('produtos'));
    }
}
