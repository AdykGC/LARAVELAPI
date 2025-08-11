<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class updateProfileRequest extends FormRequest {
    public function authorize(): bool {
        return true;
    }
    /** * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string> */
    public function rules(): array {
        return [
            'full_name' => 'sometimes|string|max:255',
            'phone' => 'sometimes|string|max:20',
            'birth_date' => 'sometimes|date|nullable',
            'address' => 'sometimes|string|nullable|max:500',
            'gender' => 'sometimes|in:male,female,other',
        ];
    }
}
