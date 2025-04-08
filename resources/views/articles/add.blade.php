@extends('template')

@section('content')
    <style>
        /* Form Styling */
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 20px;
        }

        form label {
            font-weight: bold;
        }

        form input[type="text"],
        form textarea {
            padding: 10px;
            font-size: 1em;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        form input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px;
            font-size: 1em;
            cursor: pointer;
            border-radius: 4px;
        }

        form input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>

    <h1>Ajouter article</h1>
    <form action="{{ route('article.store') }}" method="post">
        @csrf
        <label for="title">Titre</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}">
        
        <label for="content">Contenu</label>
        <textarea name="content" id="content">{{ old('content') }}</textarea>
        
        <label for="category">Catégorie</label>
        <input type="text" name="category" id="category" value="{{ old('category') }}">
        
        <input type="submit" value="Submit">
    </form>
@endsection
