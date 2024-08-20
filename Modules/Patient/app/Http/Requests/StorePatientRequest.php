<?php

namespace Modules\Patient\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:30',
            'last_name' => 'required|string|max:30',
            'gender' => 'required|in:male,female',
            'date_of_birth' => 'required|date',
            'phone_number' => 'nullable|string|max:10',
            'next_of_kin_name' => 'required|string|max:30',
            'relationship' => 'required|in:father,mother,spouce,brother,sister',
            'next_of_kin_phone_number' => 'required|string|max:10',
  
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array{
        return [
            'first_name.required' => 'The first name is required.',
            'first_name.max' => 'The first name must not exceed 30 characters.',

            'last_name.required' => 'The last name is required.',
            'last_name.max' => 'The last name must not exceed 30 characters.',

            'gender.required' => 'The gender is required.',
           

            'date_of_birth.required' => 'The date of birth is required.',
            'date_of_birth.date' => 'The date of birth must be a valid date.',

            'phone_number.string' => 'The phone number must be a string.',
            'phone_number.max' => 'The phone number must not exceed 10 characters.',

            'next_of_kin_name.required' => 'The next of kin name is required.',
            'next_of_kin_name.max' => 'The next of kin name must not exceed 30 characters.',

            'relationship.required' => 'The relationship with the next of kin is required.',
            'relationship.in' => 'The relationship must be either father, mother,spouce, brother or sister.',

            'next_of_kin_phone_number.required' => 'The next of kin phone number is required.',
            'next_of_kin_phone_number.max' => 'The next of kin phone number must not exceed 10 characters.',

        ];
    }
}
