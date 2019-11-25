@extends('layout.meulayout')

@section('minha_seccao_produtos')
  @if(isset($palavra))
    Palavra: {{$palavra}}
  @endif
@endsection