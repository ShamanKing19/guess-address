<?php

namespace app\Services\Dadata;

use App\Models\ApiToken;

class TokenService
{
    /**
     * Получение токена для запроса в "Dadata"
     * TODO: Высчитывать доступный токен, по которому не был достигнут лимит (лимит указывать в .env)
     *
     * @return ApiToken
     */
    public static function getAvailableToken(): ApiToken
    {
        return ApiToken::query()->first();
    }
}
