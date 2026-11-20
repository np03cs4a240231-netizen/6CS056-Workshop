<?php

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/* ---------------- STUDENT ROUTES ---------------- */

Route::get('/student/list', function () {
    $students = Student::all();
    $courses = Course::all();
    return view('student.list', compact('students', 'courses'));
})->name('student.list');

Route::get('/student/create', function () {
    return view('student.create');
})->name('student.create');

Route::post('/student/store', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:students,email',
        'phone' => 'required|string|max:50',
        'address' => 'nullable|string',
        'date_of_birth' => 'nullable|date',
    ]);

    Student::create($validated);

    return redirect()->route('student.list')->with('success', 'Student created successfully.');
})->name('student.store');

Route::get('/student/{id}/detail', function ($id) {
    $student = Student::findOrFail($id);
    return view('student.detail', compact('student'));
})->name('student.detail');

Route::get('/student/{id}/edit', function ($id) {
    $student = Student::findOrFail($id);
    return view('student.edit', compact('student'));
})->name('student.edit');

Route::put('/student/{id}/update', function (Request $request, $id) {
    $student = Student::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:students,email,' . $student->id,
        'phone' => 'required|string|max:50',
        'address' => 'nullable|string',
        'date_of_birth' => 'nullable|date',
    ]);

    $student->update($validated);

    return redirect()->route('student.list')->with('success', 'Student updated successfully.');
})->name('student.update');

Route::delete('/student/{id}/delete', function ($id) {
    $student = Student::findOrFail($id);
    $student->delete();

    return redirect()->route('student.list')->with('success', 'Student deleted successfully.');
})->name('student.delete');

/* ---------------- COURSE ROUTES ---------------- */

Route::get('/course/list', function () {
    $courses = Course::all();
    return view('course.list', compact('courses'));
})->name('course.list');

Route::get('/course/create', function () {
    return view('course.create');
})->name('course.create');

Route::post('/course/store', function (Request $request) {
    $validated = $request->validate([
        'code' => 'required|string|max:50|unique:courses,code',
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'credits' => 'required|integer|min:1|max:20',
    ]);

    Course::create($validated);

    return redirect()->route('student.list')->with('success', 'Course created successfully.');
})->name('course.store');

Route::get('/course/{id}/detail', function ($id) {
    $course = Course::findOrFail($id);
    return view('course.detail', compact('course'));
})->name('course.detail');

Route::get('/course/{id}/edit', function ($id) {
    $course = Course::findOrFail($id);
    return view('course.edit', compact('course'));
})->name('course.edit');

Route::put('/course/{id}/update', function (Request $request, $id) {
    $course = Course::findOrFail($id);

    $validated = $request->validate([
        'code' => 'required|string|max:50|unique:courses,code,' . $course->id,
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'credits' => 'required|integer|min:1|max:20',
    ]);

    $course->update($validated);

    return redirect()->route('student.list')->with('success', 'Course updated successfully.');
})->name('course.update');

Route::delete('/course/{id}/delete', function ($id) {
    $course = Course::findOrFail($id);
    $course->delete();

    return redirect()->route('student.list')->with('success', 'Course deleted successfully.');
})->name('course.delete');
