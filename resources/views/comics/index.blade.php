@extends('layouts.default')

@section('pageTitle', 'comics list')

@section('content')
<a href="{{ route('comics.create') }}">aggiungi nuovo fumetto</a>

<h3>tabella fumetti</h3>

<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Type</th>
            <th>Series</th>
            <th>Sale Date</th>
            <th>Price</th>
            <th>Thumb</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
    @foreach($comics as $comic)
        <tr>
            <td>{{ $comic->title}}</td>
            <td>{{ $comic->description}}</td>
            <td>{{ $comic->thumb}}</td>
            <td>{{ $comic->price}}</td>
            <td>{{ $comic->series}}</td>
            <td>{{ $comic->sale_date}}</td>
            <td>{{ $comic->type}}</td>
            <td>
                <a href="{{ route('comics.show', $comic->id ) }}">Dettagli...</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection