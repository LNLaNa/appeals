<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppealRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => '',
            'question' => 'required|min:20|max:1000',
        ];
    }
}
