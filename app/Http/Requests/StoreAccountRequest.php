<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|min:2|max:255',
            'middle_name' => 'min:0|max:255',
            'last_name' => 'required|min:2|max:255',
            'gender' => 'required',
            'role' => 'required',
            'email' => 'required|min:3|max:255|email|unique:accounts,email',
            'password' => 'required',
            'phone_number' => 'required|numeric|min:9|max:11',
            'status' => 'required',














        ];
    }
}
