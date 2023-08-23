<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/main.css')  }}">
    <title>Войти в аккаунт</title>
</head>
<body>
    <main>
        <h1>Войти в аккаунт</h1>
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="input-box">
                <label for="login">Логин</label>
                <input type="text" name="login" id="login">
                @error('login')
                    <p class="error">{{ $errors->first("login") }}</p>
                @enderror
            </div>
            <div class="input-box">
                <label for="password">Пароль</label>
                <input type="password" name="password" id="password">
                @error('password')
                    <p class="error">{{ $errors->first("password") }}</p>
                @enderror
            </div>
            <button type="submit">Войти</button>
        </form>
    </main>
</body>
</html>
