<?php

namespace App\Http\Requests;

class DadataAddressRequest extends \App\Http\Requests\BaseFormRequest
{
    /**
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'query' => ['required', 'min:4']
        ];
    }
}
