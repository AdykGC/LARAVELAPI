<?php namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class putAnotherRoleToUserRequest extends FormRequest {
    public function authorize(): bool {
        return true;
    }
    /** * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string> */
    public function rules(): array {
        return [
            'user_id'           => 'required|integer|exists:users,id',
            'role_id'           => 'required|integer|exists:roles,id',
        ];
    }
}
