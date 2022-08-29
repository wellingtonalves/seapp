<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateClientRequest extends FormRequest
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
            'name' => 'required',
            'document_number' => 'required',
            'birthday' => 'required|date',
            'email' => 'required|email|unique:clients,email',
            'phone' => 'required',
            'password' => 'required|min:6',
        ];
    }
}
