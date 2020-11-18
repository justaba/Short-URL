<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cut link</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <main>
        <div class="main">
            <h1>CUT LINK</h1>
            <h3>Сервис для сокращения ссылок</h3>
            <div class="input-container">
                <form id="form" class="form" action="/" method="post">
                    @csrf
                    @isset($url)
                        <input id="text" class="text" type="text" value="http://link.local/{{ $url }}" placeholder="Введите ссылку" name="url" required readonly>
                        <button id="button-copy" class="button-copy">Скопировать</button>
                    @else
                        <input id="text" class="text" type="text" placeholder="Введите ссылку" name="url" required>
                        <button type="submit" class="button-submit">Сократить</button>
                    @endisset
                </form>
                @isset($error)
                <div class="error">
                    <p>{{ $error }}</p>
                </div>
                @endisset
            </div>
        </div>
    </main>
    <div id="success" class="success-copy">
        <p>Ссылка скопирована</p>
    </div>
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
