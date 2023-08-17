<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/main.css')  }}">
    <link rel="stylesheet" href="{{ asset('css/table.css')  }}">
    <title>Список зарегистрированных пользователей</title>
</head>
<body>
<main>
    <h1>Список зарегистрированных пользователей</h1>
    <div>
        <form action="{{ route('search') }}" method="get" class="search-box">
            @csrf
            <label for="search">Имя:</label>
            <input type="search" name="search" id="search" value="{{request()->get('search')}}" placeholder="Введите имя">
            <label for="date">Дата регистрации:</label>
            <input type="date" name="date" id="date" value="{{request()->get('date')}}">
            <button type="submit">Искать</button>
        </form>
        <table>
            <thead>
            <tr>
                <th>id</th>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Хэш пароля</th>
                <th>Ник</th>
                <th>Дата создания</th>
                <th>Дата обновления</th>
            </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->surname }}</td>
                        <td>{{ $user->password }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
</body>
</html>
