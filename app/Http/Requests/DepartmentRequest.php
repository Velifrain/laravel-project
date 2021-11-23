<?php
declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
            'name_department' => 'unique:departments|required|min:5|max:70'
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'name_department.required' => 'Поле название отдела являеться обязательным',
            'name_department.unique' => 'Поле с таким название уже существует',
            'name_department.min' => 'Поле название отдела долно быть больше 5 символов',
            'name_department.max' => 'Поле название отдела не должно превышать больше 70 символов',
        ];
    }
}
