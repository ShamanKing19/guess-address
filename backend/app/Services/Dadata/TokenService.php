<?php

namespace App\Services\Dadata;

use App\Models\ApiToken;
use Illuminate\Support\Carbon;

class TokenService
{
    /**
     * Получение токена для запроса в "Dadata"
     *
     * @return ApiToken|null
     */
    public function getAvailableToken(): ?ApiToken
    {
        return ApiToken::with([
            'usages' => fn ($query) => $query->whereBetween('created_at', [Carbon::today()->toDateString(), Carbon::tomorrow()->toDateString()])
        ])
        ->has('usages', '<', $this->getDailyLimit())
        ->first();
    }

    private function getDailyLimit(): int
    {
        return config('limits.dadata_daily_limit');
    }
}
