<?php

namespace app\Services\Dadata;

use App\Models\ApiToken;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class DadataService
{
    private string $baseUrl = 'https://suggestions.dadata.ru/suggestions/api/4_1/rs';

    public function __construct(
        private ApiToken $token
    )
    {
    }

    public function guessAddress(string $query): Collection
    {
        $response = Http::withHeaders([
            'Authorization' => 'Token ' . $this->token->api_key
        ])
            ->get($this->baseUrl . '/suggest/address', [
                'query' => $query
            ]);

        $usage = new \App\Models\ApiTokenUsage([
            'token_id' => $this->token->id,
            'query' => $query,
            'response_status' => $response->status()
        ]);
        $usage->save();

        return $response->collect();
    }
}
