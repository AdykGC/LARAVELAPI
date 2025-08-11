<?php namespace App\Http\Requests\WebAdmin;

use Illuminate\Foundation\Http\FormRequest;

class ADMcreateStudRequest extends FormRequest {
    public function authorize(): bool {
        return true;
    }
    /** * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string> */
    public function rules(): array {
        return [
            // Личные данные студента
            'full_name'       =>   'required|string|max:255',
            'phone'           =>   'nullable|string|max:20',
            'email'           =>   'nullable|email',
            'birth_date'      =>   'nullable|date',
            'address'         =>   'nullable|string|max:255',
            'gender'          =>   'nullable|in:male,female,other',
            'avatar'          =>   'nullable|string|max:255',
            // Учебная информация
            'status'          =>   'nullable|in:active,inactive,suspended,graduated',
            'gpa'             =>   'nullable|numeric|between:0,4.00',
            'credits'         =>   'nullable|integer|min:0',
            // Внешние ключи
            'faculty_id'      =>   'nullable|exists:faculties,id',
            'major_id'        =>   'nullable|exists:majors,id',
            // Логин студента
            'stud_email'      =>   'required|email|unique:students,stud_email',
            'password'        =>   'required|string|min:6|confirmed',
        ];
    }
}