@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1 class="text-center my-5">Catalogo fumetti</h1>
    </div>
    <div class="row">
        @foreach ($elements as $item)
        <div class="col-3 mb-5">
            <div class="card h-100" style="width: 18rem;">
                <img src="{{ $item->thumb }}" class="card-img-top" style="height: 300px" alt="{{ $item->title }}">
                <div class="card-body">
                    <h4 class="card-title d-flex justify-content-center">{{ $item->title }}</h4>
                    <p class="card-text d-flex justify-content-center">
                        Prezzo: {{ $item->price }}<br>
                        Fumetto di tipo: {{ $item->type }}
                    </p>
                    <a href="{{ route('comics.show', $item->id) }}" class="btn btn-primary text-center ms-5">Mostra
                        dettagli</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection