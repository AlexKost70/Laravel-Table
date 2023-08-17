<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/main.css')  }}">
    <title>Список зарегистрированных пользователей</title>
</head>
<body>
    <main>
        <h1>Список зарегистрированных пользователей</h1>
        <button onclick="window.location='{{ route("table") }}'">Вывести список</button>
    </main>
</body>
</html>
