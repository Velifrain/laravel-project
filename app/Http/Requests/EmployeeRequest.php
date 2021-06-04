<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2|max:50',
            'first_name' => 'required|min:2|max:50',
            'last_name' => 'min:2|max:50',
            'salary' => 'integer|regex:/[^a-zA-Z]+/',
            'department' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле имя являеться обязательным',
            'name.min' => 'Поле имя долно быть больше 2х символов',
            'name.max' => 'Поле имя не должно превышать больше 50 символов',
            'first_name.required' => 'Поле фамилия являеться обязательным',
            'first_name.min' => 'Поле фамилия долно быть больше 2х символов',
            'first_name.max' => 'Поле фамилия не должно превышать больше 50 символов',
            'last_name.min' => 'Поле отчество долно быть больше 2х символов',
            'last_name.max' => 'Поле отчество е должно превышать больше 50 символов',
            'salary.required' => 'Поле заробатная плата являеться обязательным',
            'salary.integer' => 'Поле заробатная плата может быть только числом',
            'department.required' => 'Поле отдел являеться обязательным',
        ];
    }
}
