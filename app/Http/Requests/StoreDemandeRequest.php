<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDemandeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ppr' => 'nullable|string|max:100',
            'nom' => 'required|string|max:150',
            'prenom' => 'required|string|max:150',
            'cin' => 'nullable|string|max:50',
            'email_fonctionnaire' => 'required|email|max:255',
            'password' => 'required|string|min:4|confirmed',
            'nom_formation_sanitaire_id' => 'nullable|exists:nom_formation_sanitaires,id',
            'type_demande' => 'required|in:conge,attestation,autre',
            'data' => 'nullable|array',
            'captcha' => 'required',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            // Simple math captcha stored in session under 'demande_captcha'
            $expected = session('demande_captcha');
            $given = request()->input('captcha');
            if (!$expected || (string)$given !== (string)$expected) {
                $validator->errors()->add('captcha', 'Captcha incorrect.');
            }
        });
    }
}
