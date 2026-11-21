<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>{{ isset($lesson) ? 'Редактировать урок' : 'Новый урок' }}</title>
</head>
<body>
    <h1>{{ isset($lesson) ? 'Редактирование урока' : 'Новый урок для курса «' . $course->name . '»' }}</h1>

    <form method="POST" action="{{ isset($lesson) ? route('courses.lessons.update', [$course, $lesson]) : route('courses.lessons.store', $course) }}">
        @csrf
        @if(isset($lesson))
            @method('PUT')
        @endif

        <p>
            Заголовок урока (до 50 символов)<br>
            <input type="text" name="title">
            @error('title')
                <br>{{ $message }}
            @enderror
        </p>

        <p>
            Содержание урока<br>
            <textarea name="description" rows="4"></textarea>
            @error('description')
                <br>{{ $message }}
            @enderror
        </p>

        <p>
            Ссылка на видео (необязательно, формат: https://super-tube.cc...)<br>
            <input type="url" name="link">
            @error('link')
                <br>{{ $message }}
            @enderror
        </p>

        <p>
            Длительность (1–4 часа)<br>
            <input type="number" name="duration">
            @error('duration')
                <br>{{ $message }}
            @enderror
        </p>

        <a href="{{ route('courses.lessons.index', $course) }}">Отмена</a>
        <button type="submit">{{ isset($lesson) ? 'Сохранить изменения' : 'Создать урок' }}</button>
    </form>
</body>
</html>