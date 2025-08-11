<?php namespace App\Http\Requests\WebAdmin;

use Illuminate\Foundation\Http\FormRequest;

class ADMregisterRequest extends FormRequest {
    public function authorize(): bool {
        return true;
    }
    /** * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string> */
    public function rules(): array {
        return [
            'full_name' =>  'required|string|max:255',
            'email'     =>  'nullable|email|unique:web_admins,email',
            'phone'     =>  'nullable|string|max:15',
            'username'  =>  'required|string|unique:web_admins,username|max:255',
            'password'  =>  'required|string|min:8|confirmed',
        ];
    }
}
