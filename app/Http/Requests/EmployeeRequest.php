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
            'last_name' => 'required|min:2|max:50',
            'sex' => 'required',
            'salary' => 'required|regex:/[^a-zA-Z]+/',
            'department' => 'required|min:2',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле имя являеться обязательным',
            'first_name.required' => 'Поле фамилия являеться обязательным',
            'last_name.required' => 'Поле отчество являеться обязательным',
            'salary.required' => 'Поле заробатная плата являеться обязательным',
            'department.required' => 'Поле отдел являеться обязательным',
        ];
    }
}
