<?php

namespace Grilar\Api\Http\Requests;

use Grilar\Support\Http\Requests\Request;

class ApiSettingRequest extends Request
{
    public function rules(): array
    {
        return [
            'api_enabled' => 'nullable|in:0,1',
        ];
    }
}
