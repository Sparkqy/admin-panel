<?php

namespace App\Http\Requests;

use App\Rules\PhoneNumber;
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
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'profile_image' => ['sometimes', 'image', 'mimes:jpg,JPG,jpeg,JPEG,png,PNG', 'max:5000', 'dimensions:min_width=300,min_height=300'],
            'name' => ['required', 'min:6', 'max:256'],
            'phone_number' => ['required', new PhoneNumber],
            'email' => ['required', 'email'],
            'position_id' => ['required', 'exists:employees,id'],
            'salary' => ['required', 'numeric', 'between:0,500.000'],
            'head_id' => ['required', 'exists:employees,id'],
            'date_of_employment' => ['required', 'date_format:d.m.Y', 'before:today'],
        ];

        if ($this->getMethod() === 'POST') {
            $rules['email'][] = 'unique:employees,email';
        }

        return $rules;
    }
}
