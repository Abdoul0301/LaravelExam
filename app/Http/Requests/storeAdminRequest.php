<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeAdminRequest extends FormRequest
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
            'departement_id' => 'required|integer',
            'contrat_id' => 'required|integer',
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'sexe' => 'required|string',
            'salaire' => 'required',
            'role' => 'required',
            'adresse' => 'required|string',


        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Le nom de l\'administrateur est requis',
            'email.required' => 'Le mail est requis',


        ];
    }
}
