<?php namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class enrollToCourseRequest extends FormRequest {
    public function authorize(): bool {
        return true;
    }
    /** * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string> */
    public function rules(): array {
        return [
            'course_id'         =>  'required|integer|exists:courses,id',
        ];
    }
}
