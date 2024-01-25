@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1 class="text-center">Catalogo fumetti</h1>
    </div>
    <div class="row">
        @foreach ($elements as $item)
        <div class="col-3">
            <div class="card" style="width: 18rem;">
                <img src="{{ $item->thumb }}" class="card-img-top" alt="{{ $item->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->title }}</h5>
                    <p class="card-text">{{ $item->description }}</p>
                    <p class="card-text">
                        Prezzo: {{ $item->price }}<br>
                        Fumetto di tipo: {{ $item->type }}
                    </p>
                    <a href="{{ route('comics.show', $item->id) }}" class="btn btn-primary">Mostra dettagli</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection