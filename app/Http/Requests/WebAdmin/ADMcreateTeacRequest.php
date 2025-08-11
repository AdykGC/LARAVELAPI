<?php namespace App\Http\Requests\WebAdmin;

use Illuminate\Foundation\Http\FormRequest;

class ADMcreateTeacRequest extends FormRequest {
    public function authorize(): bool {
        return true;
    }
    /** * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string> */
    public function rules(): array {
        return [
            // Личные данные преподавателя
            'full_name'       =>   'required|string|max:255',
            'phone'           =>   'nullable|string|max:20',
            'email'           =>   'nullable|email',
            'birth_date'      =>   'nullable|date',
            'address'         =>   'nullable|string|max:255',
            'gender'          =>   'nullable|in:male,female,other',
            'avatar'          =>   'nullable|string|max:255',
            // Внешние ключи
            'faculty_id'      =>   'nullable|exists:faculties,id',
            'major_id'        =>   'nullable|exists:majors,id',
            // Логин преподавателя
            'teac_email'      =>   'required|email|unique:teachers,teac_email',
            'password'        =>   'required|string|min:6|confirmed',
        ];
    }
}