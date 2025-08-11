<?php namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class loginRequest extends FormRequest {
    public function authorize(): bool {
        return true;
    }
    /** * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string> */
    public function rules(): array {
        return [
            'stud_email' => 'required|email',
            'password' => 'required|string',
        ];
    }
}
