<?php namespace App\Http\Requests\WebAdmin;

use Illuminate\Foundation\Http\FormRequest;

class ADMloginRequest extends FormRequest {
    public function authorize(): bool {
        return true;
    }
    /** * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string> */
    public function rules(): array {
        return [
            'username' => 'required|string',
            'password' => 'required|string',
        ];
    }
}
