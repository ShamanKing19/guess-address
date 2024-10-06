<?php

namespace App\Http\Controllers;

use App\Http\Requests\DadataAddressRequest;
use App\Services\Dadata\DadataService;

class DadataController extends Controller
{
    public function address(DadataAddressRequest $request)
    {
        $fields = $request->validated();
        $query = $fields['query'];

        $token = \App\Services\Dadata\TokenService::getAvailableToken();
        return (new DadataService($token))->guessAddress($query);
    }
}
