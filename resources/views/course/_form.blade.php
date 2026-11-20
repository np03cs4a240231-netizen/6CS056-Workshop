@php
    $course = $course ?? new \App\Models\Course(['credits' => 3]);
@endphp

<x-form-input name="code" label="Course Code" :value="$course->code" />
<x-form-input name="title" label="Course Title" :value="$course->title" />
<x-form-textarea name="description" label="Description" :value="$course->description" />
<x-form-input name="credits" label="Credits" type="number" min="1" max="20"
              :value="$course->credits" />