<?php
declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
            'name_department' => 'required|min:5|max:70'
        ];
    }

    public function messages()
    {
        return [
            'name_department.required' => 'Поле название отдела являеться обязательным',
            'name_department.min' => 'Поле название отдела долно быть больше 5 символов',
            'name_department.max' => 'Поле название отдела не должно превышать больше 70 символов',
        ];
    }
}
