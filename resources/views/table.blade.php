<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/main.css')  }}">
    <link rel="stylesheet" href="{{ asset('css/table.css')  }}">
    <title>Список зарегистрированных пользователей</title>
</head>
<body>
<main>
    <h1>Список зарегистрированных пользователей</h1>
    <div>
        <div class="search-box">
            <label for="search">Имя:</label>
            <input type="search" name="search" id="search" placeholder="Введите имя">
            <label for="date">Дата регистрации:</label>
            <input type="date" name="date" id="date">
            <button type="reset" id="submit">Сброс</button>
        </div>
        <table>
            <thead>
            <tr>
                <th class="id">id <a href="" class="asc arrow" onclick="">↑</a><a href="" class="desc arrow">↓</a></th>
                <th class="name">Имя <a href="" class="asc arrow">↑</a><a href="" class="desc arrow">↓</a></th>
                <th class="surname">Фамилия <a href="" class="asc arrow">↑</a><a href="" class="desc arrow">↓</a></th>
                <th class="password">Хэш пароля <a href="" class="asc arrow">↑</a><a href="" class="desc arrow">↓</a></th>
                <th class="username">Ник <a href="" class="asc arrow">↑</a><a href="" class="desc arrow">↓</a></th>
                <th class="created_at">Дата создания <a href="" class="asc arrow">↑</a><a href="" class="desc arrow">↓</a></th>
                <th class="updated_at">Дата обновления <a href="" class="asc arrow">↑</a><a href="" class="desc arrow">↓</a></th>
                <th class="phone">Телефон <a href="" class="asc arrow">↑</a><a href="" class="desc arrow">↓</a></th>
                <th class="address">Адрес <a href="" class="asc arrow">↑</a><a href="" class="desc arrow">↓</a></th>
            </tr>
            </thead>
            <tbody id="tbody"></tbody>
        </table>
        <div class="bottom">
            <p class="total">Всего пользователей: <span>0</span></p>
            <form action="{{ route("logout") }}" method="post">
                @csrf
                <button id="logout">Выйти</button>
            </form>
        </div>
    </div>
</main>
<script type="text/javascript" src="{{ asset('js/table.js') }}"></script>
</body>
</html>
