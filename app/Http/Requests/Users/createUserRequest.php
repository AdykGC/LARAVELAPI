<?php namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class createUserRequest extends FormRequest {
    public function authorize(): bool {
        return true;
    }
    /** * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string> */
    public function rules(): array {
        return [
            'full_name'         =>  'required|string|max:255',
            'university_email'  =>  'required|email|unique:users,university_email',
            'email'             =>  'nullable|email|unique:users,email',
            'phone'             =>  'nullable|string|max:15',
            'password'          =>  'required|string|min:8|confirmed',
            'role_id'           => 'required|integer|exists:roles,id',
        ];
    }
}
