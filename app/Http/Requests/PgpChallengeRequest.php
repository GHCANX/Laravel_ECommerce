<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PgpChallengeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'challenge_response' => 'required|string|min:6|max:64',
        ];
    }
}
