<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('store') }}" method="post">
        @csrf
        <label>
            ФИО:
            <input type="text" name="full_name">
        </label>
        <br>
        <label>
            Телефон:
            <input type="text" name="phone_number">
        </label>
        <br>
        <label>
            Почта:
            <input type="text" name="email">
        </label>
        <br>
        <button type="submit">Отправить</button>
    </form>
</body>
</html>