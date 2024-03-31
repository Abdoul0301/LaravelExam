<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class saveAbsenceRequest extends FormRequest
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
            'type_absences' => 'required',
            'explication' => 'required',
            'date_debut' => 'required',
            'date_fin' => 'required',


        ];
    }

    public function messages()
    {
        return [
            'type_absences.required' => 'Le type d\'absence est requis',
            'explication.required' => 'L\'explication est requis',
            'date_debut.required' => 'La date de debut est requis',
            'date_fin.required' => 'La date de fin est requis',
        ];
    }
}
