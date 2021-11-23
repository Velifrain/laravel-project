<?php
declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:50',
            'department_id' => 'required',
            'surname' => 'required|max:50',
            'patronymic' => 'max:50',
            'salary' => 'integer|regex:/[^a-zA-Z]+/',
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
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
