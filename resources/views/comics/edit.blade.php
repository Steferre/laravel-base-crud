@extends('layouts.default')

@section('pageTitle', 'modify comic')

@section('content')

{{-- @include('partials.errorsBox') --}}
@dump($errors->all())
<form action="{{ route('comics.update', $comic->id) }}" method="post">
    @csrf

    {{-- bisogna aggiunger un metodo tramite laravel perche' il form accetta solo post o get come method --}}
    {{-- il metodo da aggiungere puo' essere put o patch --}}
    {{-- il metodo PUT si dovrebbe utilizzare quando bisogna modificare tutte le voci --}}
    {{-- il metodo PATCH servirebbe quando si fa una modifica parziale dei dati --}}
    {{-- ma generalmente vengono utilizzati senza questa distinzione che e' solo formale --}}
    @method('PATCH')

    <label for="title">Title</label>
    <input type="text" name="title" id="title" value="{{ $comic->title }}">

    <label for="type">Type</label>
    <input type="text" name="type" id="type" value="{{ $comic->type }}">

    <label for="series">Series</label>
    <input type="text" name="series" id="series" value="{{ $comic->series }}">

    <label for="sale_date">Sale Date</label>
    <input type="date" name="sale_date" id="sale_date" value="{{ $comic->sale_date }}">

    <label for="price">Price</label>
    <input type="text" name="price" id="price" value="{{ $comic->price }}">

    <label for="thumb">Thumb</label>
    <input type="text" name="thumb" id="thumb" value="{{ $comic->thumb }}">

    <label for="description">Description</label>
    {{-- <textarea name="description" id="description" rows="10" value="{{ $comic->description }}"></textarea> --}}
    <input type="text" name="description" id="description" value="{{ $comic->description }}">

    <input type="submit" value="Salva modifiche">
</form>
@endsection