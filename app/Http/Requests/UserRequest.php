<?php

namespace App\Http\Requests;

use App\Rules\MinAge;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $id = $this->route('user');
        $rules = [
            'name' => 'required|min:6',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required|min:8',
            'age' => ['required', 'integer', new MinAge(18)],
        ];

        if ($id) {
            $rules['name'] = 'sometimes|min:6';
            $rules['email'] = 'sometimes|email|unique:users,email,' . $id;
            $rules['password'] = 'sometimes|min:8';
            $rules['age'] = ['sometimes', 'integer', new MinAge(18)];
        }

        return $rules;
    }

    /**
     * Get the custom messages for validator errors.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'required' => ':attribute is required.',
            'min' => ':attribute must be at least :min characters.',
            'email' => ':attribute must be a valid email address.',
            'unique' => ':attribute has already been taken.',
            'min_age' => ':attribute must be at least :min years old.'
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, mixed>
     */
    public function attributes()
    {
        return [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'age' => 'Age',
        ];
    }
}
