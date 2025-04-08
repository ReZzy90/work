@extends('template')

@section('content')
    <style>
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #333; 
            color: white; 
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        a {
            display: inline-block;
            padding: 8px 12px;
            margin: 5px;
            text-decoration: none;
            color: #fff;
            background-color: black;
            border-radius: 4px;
        }

        a:hover {
            background-color: #333; 
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            background-color: black;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }

        .btn:hover {
            background-color: #333;
        }
    </style>

    <h1>Articles</h1>
    <h2>Liste des articles</h2>
    <a href="{{ route('article.add') }}" class="btn">Ajouter article</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Catégorie</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $article)
                <tr>
                    <td><a href="{{ route('article', $article['id']) }}">{{ $article['id'] }}</a></td>
                    <td>{{ $article['title'] }}</td>
                    <td>{{ $article['category'] }}</td>
                    <td>
                        <a href="{{ route('article.edit', $article['id']) }}" class="btn">Editer</a>
                        <a href="{{ route('article.delete', $article['id']) }}" class="btn" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">Supprimer</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
