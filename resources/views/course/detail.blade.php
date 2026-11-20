<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
</head>
<body>
    <h1>Add Course</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('course.store') }}" method="POST">
        @csrf

        <div>
            <label for="code">Course Code:</label>
            <input type="text" id="code" name="code" value="{{ old('code') }}" required>
        </div>

        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
        </div>

        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description">{{ old('description') }}</textarea>
        </div>

        <div>
            <label for="credits">Credits:</label>
            <input type="number" id="credits" name="credits" value="{{ old('credits', 3) }}" required>
        </div>

        <button type="submit">Save Course</button>
        <a href="{{ route('course.list') }}">Back to List</a>
    </form>
</body>
</html>
