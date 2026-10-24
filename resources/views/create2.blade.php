<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('store2') }}" method="post">
        @csrf
        <label>
            Помещение:
            <select name="room">
                <option value="audience">Аудитория</option>
                <option value="coworking">Коворкинг</option>
                <option value="cinema">Кинозал</option>
            </select>
        </label>
        <br>
        <button type="submit">Отправить</button>
    </form>
</body>
</html>