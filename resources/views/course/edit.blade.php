<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Detail</title>
</head>
<body>
    <h1>Course Detail</h1>

    <p><strong>ID:</strong> {{ $course->id }}</p>
    <p><strong>Code:</strong> {{ $course->code }}</p>
    <p><strong>Title:</strong> {{ $course->title }}</p>
    <p><strong>Description:</strong> {{ $course->description ?? 'N/A' }}</p>
    <p><strong>Credits:</strong> {{ $course->credits }}</p>

    <a href="{{ route('course.edit', $course->id) }}">Edit</a>
    <a href="{{ route('course.list') }}">Back to List</a>
</body>
</html>
