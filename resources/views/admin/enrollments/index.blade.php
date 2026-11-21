<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Записи студентов</title>
</head>
<body>
    <a href="{{ route('courses.index') }}">← Назад к курсам</a>

    <h1>Записи студентов</h1>

    <form method="GET" action="{{ route('enrollments.index') }}">
        Курс:
        <select name="course_id">
            <option value="">Все курсы</option>
            @foreach($courses as $course)
                <option value="{{ $course->id }}" {{ request('course_id') == $course->id ? 'selected' : '' }}>
                    {{ $course->name }}
                </option>
            @endforeach
        </select>
        <button type="submit">Показать</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Студент</th>
                <th>Курс</th>
                <th>Дата записи</th>
            </tr>
        </thead>
        <tbody>
            @forelse($enrollments as $enrollment)
                <tr>
                    <td>{{ $enrollment->user->email }}</td>
                    <td>{{ $enrollment->course->name }}</td>
                    <td>{{ $enrollment->created_at->format('d.m.Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Записей пока нет.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>