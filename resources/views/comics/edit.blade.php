@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Modifica Fumetto</h2>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <div class="row">
        <form action="{{ route('comics.update', $comic->id) }}" method="POST">
            @csrf
            @method('PUT')
            {{-- title description type image cooking_time weight --}}
            <div class="mb-3">
                <label for="title" class="form-label">title</label>
                <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ old('title') ?? $comic->title}}">
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">description</label>
                <textarea type="text" class="form-control" id="description"
                    name="description">{{ old('description') ?? $comic->description}}</textarea>
            </div>
            <div class="mb-3">
                <label for="thumb" class="form-label">thumb</label>
                <input type="text" class="form-control" id="thumb" name="thumb" value="{{$comic->thumb}}">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">price</label>
                <input type="text" class="form-control" id="price" name="price" value="{{$comic->price}}">
            </div>
            <div class="mb-3">
                <label for="series" class="form-label">series</label>
                <input type="text" class="form-control" id="series" name="series" value="{{$comic->series}}">
            </div>
            <div class="mb-3">
                <label for="sale_date" class="form-label">sale_date</label>
                <input type="text" class="form-control" id="sale_date" name="sale_date" value="{{$comic->sale_date}}">
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">type</label>
                <select class="form-select" id="type" name="type">
                    <option value="comic book" @selected(old('type', $comic->type) == 'comic book')>Comic Book</option>
                    <option value="graphic novel" @selected(old('type', $comic->type) == 'graphic novel')>Graphic Novel
                    </option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Inserisci</button>
        </form>
    </div>
</div>
@endsection