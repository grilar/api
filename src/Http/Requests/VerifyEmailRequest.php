<?php

namespace Grilar\Api\Http\Requests;

use Grilar\Support\Http\Requests\Request;

class VerifyEmailRequest extends Request
{
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'token' => 'required|string',
        ];
    }
}
