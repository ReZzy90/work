<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        header {
            background-color: black;
            color: white;
            padding: 10px;
        }

        header ul {
            list-style: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: black;
        }

        header li {
            float: left;
        }

        header li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        header li a:hover {
            background-color: white;
            color: black;
        }
    </style>
</head>

<body>
    <header>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="{{route('articles')}}">Articles</a></li>
        </ul>
    </header>

    <div>
        @yield('content')
    </div>
</body>

</html>
