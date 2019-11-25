<!DOCTYPE html>
<html lang="en">
<head>
  <link href="{{ URL::to('css/app.css')}}" rel="stylesheet">
  <title>Document</title>
</head>
<body>

  @hasSection('minha_seccao_produtos')
    <div class="card">
      <div class="card-body">
        <h5 class="card-title" style="width:500px; margin:10px;">Produtos</h5>
        <p class="card-text">
          @yield('minha_seccao_produtos')</p>
          <a href="#" class="card-link">Informaçoes</a>
          <a href="#" class="card-link">Ajuda</a>
      </div>
    </div>
  @endif


  <script src="{{ URL::to('js/app.js')}}" type="text/javascript"></script>
</body>
</html>