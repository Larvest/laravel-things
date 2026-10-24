<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('store3') }}" method="post">
        @csrf
        <label>
            Название конференции:
            <input type="text" name="name">
        </label>
        <br>
        <label>
            Помещение:
            <input type="text" name="place">
        </label>
        <br>
        <label>
            Дата начала:
            <input type="data" name="date">
        </label>
        <br>
        <label>
            Помещение:
            <select name="payment">
                <option value="СБП">Аудитория</option>
                <option value="По карте">Коворкинг</option>
                <option value="Apple pay">Кинозал</option>
            </select>
        </label>
        <br>
        <label>
            Описание
            <input type="text" name="desc">
        </label>
        <br>
        <button type="submit">Отправить</button>
    </form>
</body>
</html>