@extends('layout.meulayout')

@section('minha_seccao_produtos')

  <h1>Loolp Foreach - Arrays Associativos</h1>

  @foreach($produtos as $p)
    <p>{{ $p['id'] }}: {{ $p['nome'] }}</p>
  @endforeach

  <hr>

  @foreach($produtos as $p)
    <p>
      {{ $p['id'] }}: {{ $p['nome'] }}
      @if($loop->first)
        (primeiro)
      @endif
      @if($loop->last)
        (é o ultimo)
      @endif
          @if($loop->first)
        (primeiro)
      @endif
      <span class="badge badge-secondary">
        {{ $loop->index }}  /  {{ $loop->count }}  /  {{ $loop->remaining }}
      </span>
      <span class="badge badge-warning">
        {{ $loop->iteration }}  /  {{ $loop->count }}
      </span>
    </p>
  @endforeach

@endsection
