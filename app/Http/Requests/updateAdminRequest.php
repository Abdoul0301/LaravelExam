<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateAdminRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required',
            'contact' => 'required',
            'sexe' => 'required|string',
            'adresse' => 'required|string',
            'salaire' => 'required',
            'contrat_id' => 'required|integer',
            'role' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Le mail est requis',
            'contact.required' => 'Le numero de téléphone est requis',
            'nom.required' => 'Le nom est requis',
            'prenom.required' => 'Le prenom est requis'

        ];
    }
}
