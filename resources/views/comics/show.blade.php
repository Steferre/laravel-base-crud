@extends('layouts.default')

@section('pageTitle', 'single comic')

@section('content')
<a href="{{ route('comics.index') }}">pagina principale</a>

<h3>singolo fumetto</h3>

<p>{{ $comic->title }}</p>
<p>{{ $comic->type }}</p>
<p>{{ $comic->series }}</p>
<p>{{ $comic->sale_date }}</p>
<p>{{ $comic->price }}</p>
<p>{{ $comic->thumb }}</p>
<p>{{ $comic->description }}</p>


@endsection