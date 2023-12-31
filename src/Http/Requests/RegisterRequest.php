<?php

namespace Grilar\Api\Http\Requests;

use Grilar\Api\Facades\ApiHelper;
use Grilar\Support\Http\Requests\Request;

class RegisterRequest extends Request
{
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:120|min:2',
            'last_name' => 'required|string|max:120|min:2',
            'email' => 'required|max:60|min:6|email|unique:' . ApiHelper::getTable(),
            'password' => 'required|string|min:6|confirmed',
        ];
    }
}
