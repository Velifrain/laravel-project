<?php
declare(strict_types=1);

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
            'name' => 'required|max:50',
            'department_id' => 'required',
            'surname' => 'required|max:50',
            'patronymic' => 'max:50',
            'salary' => 'integer|regex:/[^a-zA-Z]+/',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле имя являеться обязательным',
            'name.max' => 'Поле имя не должно превышать больше 50 символов',
            'department_id.required' => 'Поле отдел являеться обязательным',
            'surname.required' => 'Поле фамилия являеться обязательным',
            'surname.max' => 'Поле фамилия не должно превышать больше 50 символов',
            'patronymic.max' => 'Поле отчество е должно превышать больше 50 символов',
            'salary.integer' => 'Поле заробатная плата может быть только числом',

        ];
    }
}
