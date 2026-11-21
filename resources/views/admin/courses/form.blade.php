<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>{{ isset($course) ? 'Редактировать курс' : 'Создать курс' }}</title>
</head>
<body>
    <h1>{{ isset($course) ? 'Редактирование курса' : 'Новый курс' }}</h1>

    <form method="POST" action="{{ isset($course) ? route('courses.update', $course) : route('courses.store') }}" enctype="multipart/form-data">
        @csrf
        @if(isset($course))
            @method('PUT')
        @endif

        <p>
            Название курса (до 30 символов)<br>
            <input type="text" name="name">
            @error('name')
                <br>{{ $message }}
            @enderror
        </p>

        <p>
            Описание (необязательно, до 100 символов)<br>
            <textarea name="description" rows="2"></textarea>
            @error('description')
                <br>{{ $message }}
            @enderror
        </p>

        <p>
            Количество часов (1–10)<br>
            <input type="number" name="hours">
            @error('hours')
                <br>{{ $message }}
            @enderror
        </p>

        <p>
            Цена (от 100)<br>
            <input type="number" step="0.01" name="price">
            @error('price')
                <br>{{ $message }}
            @enderror
        </p>

        <p>
            Дата начала<br>
            <input type="date" name="start_date">
            @error('start_date')
                <br>{{ $message }}
            @enderror
        </p>

        <p>
            Дата окончания<br>
            <input type="date" name="end_date">
            @error('end_date')
                <br>{{ $message }}
            @enderror
        </p>
        <a href="{{ route('courses.index') }}">Отмена</a>
        <button type="submit">{{ isset($course) ? 'Сохранить изменения' : 'Создать курс' }}</button>
    </form>
</body>
</html>