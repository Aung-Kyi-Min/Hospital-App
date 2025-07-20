<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminDoctorEditRequest extends FormRequest
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
            'doctor_name' => ['required', 'max:255'],
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'specialization' => ['required','max:225'],
            'email' => ['required','email','max:225'],
            'experience' => ['required','max:225'],
            'phone' => ['required','max:225'],
            'qualification' => ['required','max:225'],
            'status' => ['required','max:225'],
            'bio' => ['nullable','max:225'],
            'availability' => ['nullable','max:520'],
        ];
    }
}