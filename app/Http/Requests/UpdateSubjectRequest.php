<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:subjects,name',
            'workload' => 'required|integer',
            'is_optional' => 'boolean',
            'course_semester' => 'required|integer|min:1|max:10',
            'prerequisite_id' => 'nullable|exists:subjects,id',
            'course_id' => 'nullable|exists:courses,id',
        ];
    }
}
