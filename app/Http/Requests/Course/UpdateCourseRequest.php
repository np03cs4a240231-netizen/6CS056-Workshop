<?php

namespace App\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $course = $this->route('course');
        $courseId = is_object($course) ? $course->id : $course;

        return [
            'code' => [
                'required',
                'string',
                'max:50',
                Rule::unique('courses', 'code')->ignore($courseId),
            ],
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'credits' => 'required|integer|min:1|max:20',
        ];
    }
}