<?php namespace App\Http\Requests\WebAdmin;

use Illuminate\Foundation\Http\FormRequest;

class ADMcreateCourRequest extends FormRequest {
    public function authorize(): bool {
        return true;
    }
    /** * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string> */
    public function rules(): array {
        return [
            'title'         => 'required|string|max:255',
            'description'   => 'nullable|string',
            'credits'       => 'required|integer|min:1|max:12',
            'status'        => 'nullable|in:active,inactive',
        ];
    }
}