@extends('layouts.default')

@section('pageTitle', 'comics list')

@section('content')
<a href="{{ route('comics.create') }}">aggiungi nuovo fumetto</a>

<h3>lista fumetti</h3>    
@endsection