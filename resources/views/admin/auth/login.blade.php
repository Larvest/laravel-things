<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вход</title>
</head>
<body>
    <h1>Вход</h1>

    <form method="POST" action="{{ url('/course-admin/login') }}">
        @csrf

        <p>
            Email<br>
            <input type="email" name="email"">
            @error('email')
                <br>{{ $message }}
            @enderror
        </p>

        <p>
            Пароль<br>
            <input type="password" name="password">
            @error('password')
                <br>{{ $message }}
            @enderror
        </p>

        <button type="submit">Войти</button>
    </form>
</body>
</html>
