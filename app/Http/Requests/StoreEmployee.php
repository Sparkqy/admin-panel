<?php

namespace App\Http\Requests;

use App\Rules\PhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class StoreEmployee extends FormRequest
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
        return [
            'profile_image' => ['required', 'image', 'mimes:jpg,JPG,jpeg,JPEG,png,PNG', 'max:5000', 'dimensions:min_width=300,min_height=300'],
            'name' => ['required', 'min:6', 'max:255'],
            'phone_number' => ['required', new PhoneNumber],
            'email' => ['required', 'email', 'unique:users,email'],
            'position_id' => ['required', 'numeric', 'min:0', 'not_in:0'],
            'salary' => ['required', 'numeric', 'between:0,500.000'],
            'boss_id' => ['required', 'numeric', 'min:0', 'not_in:0'],
            'date_of_employment' => ['required', 'date_format:d.m.Y', 'before:today'],
        ];
    }
}
