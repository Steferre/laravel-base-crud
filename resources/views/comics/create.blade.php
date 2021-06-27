@extends('layouts.default')

@section('pageTitle', 'insert new comic')

@section('content')

@include('partials.errorsBox')

<form action="{{ route('comics.store') }}" method="post">
    @csrf
    <label for="title">Title</label>
    <input type="text" name="title" id="title">

    <label for="type">Type</label>
    <input type="text" name="type" id="type">

    <label for="series">Series</label>
    <input type="text" name="series" id="series">

    <label for="sale_date">Sale Date</label>
    <input type="date" name="sale_date" id="sale_date">

    <label for="price">Price</label>
    <input type="text" name="price" id="price">

    <label for="thumb">Thumb</label>
    <input type="text" name="thumb" id="thumb">

    <label for="description">Description</label>
    {{-- <textarea name="description" id="description" rows="10"></textarea> --}}
    <input type="text" name="description" id="description">

    <input type="submit" value="Invia">
</form>
@endsection