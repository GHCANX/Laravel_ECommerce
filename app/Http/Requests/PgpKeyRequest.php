<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PgpKeyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'pgp_publickey' => [
                'required',
                'string',
                'min:300',
                'max:50000',
                'starts_with:-----BEGIN PGP PUBLIC KEY BLOCK-----',
                'ends_with:-----END PGP PUBLIC KEY BLOCK-----',
            ],
        ];
    }
}
