<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="{{ asset('css/app.css')}}" rel="stylesheet">
  <!-- Ou utilizar {{ URL::to('css/app.css')}} -->
  <title>Document</title>
</head>
<body>
<!--
  @component('components.meucomponente')
    <strong>Erro: </strong> Mensagem de erro.
    @slot('titulo')
      Erro fatal
    @endslot
    @slot('tipo')
      primary
    @endslot
  @endcomponent -->

  <!-- OU -->
  @component('components.meucomponente', ['tipo'=>'danger', 'titulo'=>'Erro fatal'])
    <strong>Erro: </strong> Mensagem de erro.
  @endcomponent

  <!-- @alerta(['tipo'=>'warning', 'titulo'=>'Erro fatal'])
    <strong>Erro: </strong> Mensagem de erro.
  @endalerta -->

  <script src="{{ asset('js/app.js')}}" type="text/javascript"></script>
  <!-- Ou utilizar {{ URL::to('ja/app.js')}} -->
</body>
</html>