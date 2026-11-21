<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Уроки курса: {{ $course->name }}</title>
</head>
<body>
    <a href="{{ route('courses.index') }}">← Назад к курсам</a>

    <h1>Уроки курса «{{ $course->name }}» ({{ $lessons->count() }}/5)</h1>

    @if($lessons->count() < 5)
        <a href="{{ route('courses.lessons.create', $course) }}">+ Добавить урок</a>
    @endif

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif
    @if(session('error'))
        <p>{{ session('error') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>Название</th>
                <th>Длительность</th>
                <th>Ссылка на видео</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse($lessons as $lesson)
                <tr>
                    <td>
                        <strong>{{ $lesson->title }}</strong><br>
                        {{ Str::limit($lesson->description, 80) }}
                    </td>
                    <td>{{ $lesson->duration }} ч.</td>
                    <td>
                        @if($lesson->link)
                            <a href="{{ $lesson->link }}" target="_blank">{{ $lesson->link }}</a>
                        @else
                            Нет ссылки
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('courses.lessons.edit', [$course, $lesson]) }}">Редактировать</a>
                        <form action="{{ route('courses.lessons.destroy', [$course, $lesson]) }}" method="POST" onsubmit="return confirm('Удалить урок?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Удалить</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Уроков пока нет. Нажмите «Добавить урок».</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>