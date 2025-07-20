<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserEditRequest extends FormRequest
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
            'username' => ['nullable', 'max:255'],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'address' => ['nullable','max:225'],
            'gender' => ['nullable','max:225'],
            'phone' => ['nullable','max:225'],
            'disease_description' => ['nullable','max:225'],
            'blood_type' => ['nullable','max:225'],
        ];
    }
}