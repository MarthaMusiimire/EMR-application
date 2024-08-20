<?php

namespace Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'max:50', 'unique:users,username,' . $this->user->id],
            'email' => ['required', 'email', 'max:255', 'exists:users,email,' . $this->user->id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'in:1,2,3,4'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    public function messages(): array
    {
        return [
            'username.string' => 'The username must be a string.',
            'username.max' => 'The username should not be greater than 50 characters.',
            'username.unique' => 'The username has already been taken.',
            'email.required' => 'The email field is required.',
            'email.string' => 'The email must be a string.',
            'email.email' => 'The email must be a valid email address.',
            'email.max' => 'The email may not be greater than 50 characters.',
            'email.unique' => 'The email has already been taken.',
            'username.required' => 'The username field is required.',
            'password.required' => 'The password field is required.',
            'password.string' => 'The password must be a string.',
            'password.min' => 'The password must be at least 8 characters.',
            'password.confirmed' => 'The password confirmation does not match.',
            'role.required' => 'The role field is required.',
            'role.string' => 'The role must be a string.',
        ];
    }
}
