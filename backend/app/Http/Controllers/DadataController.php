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

        $token = (new \App\Services\Dadata\TokenService)->getAvailableToken();
        if ($token === null) {
            // TODO: Выпускать новый токен
            return response(['message' => 'Нет доступных токенов'], 429);
        }

        return (new DadataService($token))->guessAddress($query);
    }
}
