<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends  FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'search' => 'nullable|string|max:70',
            'date' => 'nullable|date'
        ];
    }
}
