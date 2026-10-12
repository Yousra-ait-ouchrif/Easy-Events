<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class annonceRequest extends FormRequest
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
            'titre' => 'required|unique:annonces,titre',
            'description'=> 'max:100',
            'type' => 'in:Appartement,Maison,Villa,Magasin,Terrain',
            'ville'=> 'alpha',
            'superficie'=>'numeric|min:20',
            'prix'=>'numeric|min:0'
        ];
    }
}
