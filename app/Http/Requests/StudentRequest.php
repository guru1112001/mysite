<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Authorization logic, if needed
    }

    public function rules()
    {
        return [
            'name' => 'required|string|alpha|max:100',
            'class' => 'required|string|numeric|max:10',
            'rollno' => 'required|string||numeric|max:10',
            'gender' => 'required|in:male,female',
            'city_id' => 'required|exists:cities,id',
            'country_id' => 'required|exists:countries,id',
            'email' => 'required|string|email|max:30|unique:students',
            'confirm_checkbox' => 'accepted', // Custom validation rule for checkbox
        ];
    }
}
