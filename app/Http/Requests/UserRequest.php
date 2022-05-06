<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'phone' => ['required', 'unique:users'],
            'password' => ['required', 'unique:users'],
            'email' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Имя обязательное поля.',
            'phone.required' => 'Телефон обязательное поле.',
            'password.required' => 'Пароль обязательное поле.',
            'phone.unique' => 'Данный телефон уже используется.',
        ];
    }
}
