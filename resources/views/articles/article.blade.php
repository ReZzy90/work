@extends('template')

@section('content')
    <style>
        h1 {
            font-size: 2em;
            color: #007BFF;
        }

        h2 {
            font-size: 1.5em;
            margin-top: 10px;
        }

        p {
            font-size: 1.2em;
            margin-top: 10px;
        }
    </style>

    <h1>Article</h1>
    <h2>{{ $data['title'] }}</h2>
    <p>{{ $data['content'] }}</p>
    <p><strong>Catégorie:</strong> {{ $data['category'] }}</p>
@endsection
