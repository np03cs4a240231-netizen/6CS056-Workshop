<?php

namespace App\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'code' => 'required|string|max:50|unique:courses,code',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'credits' => 'required|integer|min:1|max:20',
        ];
    }
}
