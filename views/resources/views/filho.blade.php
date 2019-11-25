@extends('layout.app')

@section('titulo', 'A minha página - Filho')

@section('barralateral')
  @parent
  <p>Esta parte é do filho</p>
@endsection

@section('conteudo')
  <p>Este é o conteudo do filho</p>
@endsection