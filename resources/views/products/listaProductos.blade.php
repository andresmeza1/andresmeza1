@extends('layouts.menu')

@section('contenido')

<div class="row">
    <div class="col s12 m7">
      @foreach ($productos as $producto)
        <div class="card col s4">
          <div class="card-image">
            <img src="{{asset('img/'.$producto->imagen)}}">
              <span class="card-title">{{ $producto->nombre }}</span>
          </div>
            <div class="card-content">
                <p>{{ $producto->descripcion }}</p>
                <p>{{ $producto->precio }}</p>
                <p>{{ $producto->marca }}</p>
                <p>{{ $producto->categoria }}</p>
            </div>
        </div>
      @endforeach
    </div>
  </div>

@endsection
