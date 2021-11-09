<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App</title>
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
</head>

<body>

    <header class="header">
        <nav class="navbar">
            <h1 class="logo">Todo App</h1>
            <ul class="navlist">
                <li><a href="{{ route('welcome') }}" class="navlink">All Todos</a></li>
                <li><a href="{{ route('create') }}" class="navlink">create Todo</a></li>
            </ul>
        </nav>
    </header>

    @yield('content')

</body>

</html>