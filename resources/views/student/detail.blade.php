<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Detail</title>
</head>
<body>
    <h1>Student Detail</h1>

    <p><strong>ID:</strong> {{ $student->id }}</p>
    <p><strong>Name:</strong> {{ $student->name }}</p>
    <p><strong>Email:</strong> {{ $student->email }}</p>
    <p><strong>Phone:</strong> {{ $student->phone }}</p>
    <p><strong>Address:</strong> {{ $student->address ?? 'N/A' }}</p>
    <p><strong>Date of Birth:</strong> {{ $student->date_of_birth ?? 'N/A' }}</p>

    <a href="{{ route('student.edit', $student->id) }}">Edit</a>
    <a href="{{ route('student.list') }}">Back to List</a>
</body>
</html>
