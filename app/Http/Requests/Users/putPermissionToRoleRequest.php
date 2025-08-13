<?php namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class putPermissionToRoleRequest extends FormRequest {
    public function authorize(): bool {
        return true;
    }
    /** * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string> */
    public function rules(): array {
        return [
            'role_id'           => 'required|integer|exists:roles,id',
            'permissions'       => 'required|array',
            'permissions.*'     => 'integer|exists:permissions,id',
        ];
    }
}
