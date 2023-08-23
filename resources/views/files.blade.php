<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/main.css')  }}">
    <link rel="stylesheet" href="{{ asset('css/files.css')  }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Файлы</title>
</head>
<body>
    <main>
        <div class="upload">
            <h1>Файлы</h1>
            <form action="{{ route('upload') }}" enctype='multipart/form-data' method="post">
                @csrf
                <label for="image">Загрузить изображение: </label>
                <input type="file" name="image" id="image" accept="image/*">
                <button type="submit">Отправить</button>
            </form>
        </div>
        <div class="gallery">

        </div>
    </main>
    <script type="text/javascript" src="{{ asset('js/files.js') }}"></script>
</body>
</html>
