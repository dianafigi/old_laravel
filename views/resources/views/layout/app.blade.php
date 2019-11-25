<!DOCTYPE html>
<html lang="en">
<head>
  <title>My title - @yield('titulo')</title>
  <!-- está a ir buscar ao filho -->
</head>
<body>
  @section('barralateral')
    <p>Esta parte da secção é do template do pai</p>
  @show
  <!-- so mostra a frase pq tem @show, se tivesse endsection nao mostrava pois esta section nao ta definida no filho logo simplesmente n aparecia -->
  <div>
    @yield('conteudo')
  </div>
  <!-- com esta funcao do laravel diz qual é a section que se vai mostrar -->
</body>
</html>
