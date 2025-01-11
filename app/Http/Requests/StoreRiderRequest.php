<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRiderRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|phone:PH',
            'vehicle_type' => 'required|in:bicycle,motorcycle,car',
            'birth_date' => 'required|date',
            'address' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png'
        ];
    }

    public function messages(): array 
    {
        return [
            'phone_number.phone' => 'Please provide a valid Philippine phone number.',
        ];
    }
}
