<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/main.css')  }}">
    <title>Меню</title>
</head>
<body>
    <main>
        <h1>Меню</h1>
        <ul class="menu">
            <li><a href={{ route('welcome') }}>Начальная страница Laravel</a></li>
            <li><a href={{ route('files') }}>Фотогалерея</a></li>
            <li><a href={{ route('table') }}>Список зарегистрированных пользователей</a></li>
        </ul>
        <form action="{{ route("logout") }}" method="post">
            @csrf
            <button id="logout">Выйти</button>
        </form>
    </main>
</body>
</html>
