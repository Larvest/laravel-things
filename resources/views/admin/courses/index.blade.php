<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список курсов</title>
</head>
<body>
    <a href="{{ route('courses.index') }}">Курсы</a>
    @if(Route::has('enrollments.index'))
        <a href="{{ route('enrollments.index') }}">Записи студентов</a>
    @endif

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Выйти</button>
    </form>

    <h1>Курсы</h1>

    <a href="{{ route('courses.create') }}">+ Добавить курс</a>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>Обложка</th>
                <th>Название</th>
                <th>Часы</th>
                <th>Цена</th>
                <th>Даты</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse($courses as $course)
                <tr>
                    <td>
                        <strong>{{ $course->name }}</strong><br>
                        {{ $course->description }}
                    </td>
                    <td>{{ $course->hours }} ч.</td>
                    <td>{{ $course->price }} ₽</td>
                    <td>{{ $course->start_date->format('d.m.Y') }} — {{ $course->end_date->format('d.m.Y') }}</td>
                    <td>
                        <a href="{{ route('courses.lessons.index', $course) }}">Уроки</a>
                        <a href="{{ route('courses.edit', $course) }}">Редактировать</a>
                        <form action="{{ route('courses.destroy', $course) }}" method="POST" onsubmit="return confirm('Удалить курс?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Удалить</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Курсов пока нет. Нажмите «Добавить курс».</td>
                </tr>
            @endforelse
        </tbody>
    </table>    

    {{ $courses->links('pagination::bootstrap-5') }}
</body>
</html>