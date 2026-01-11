<?php

namespace App\AI\Services;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class OpenRouterAPI
{
    /**
     * @param string $prompt
     * @return array|Response
     */
    public function apiCall($prompt)
    {
        $apiKey = config('services.openrouter.key');
        $apiUrl = config('services.openrouter.url');
        $apiModel = config('services.openrouter.model');

        /** @var Response $response */
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
            'Content-Type' => 'application/json',
        ])->post($apiUrl, [
            'model' => $apiModel,
            'messages' => [
                ['role' => 'user', 'content' => $prompt]
            ],
            'reasoning' => ['enabled' => true]
        ]);

        return $response->successful() ? $response->json() : [
            'error' => 'API request failed',
            'status' => $response->status(),
            'body' => $response->body()
        ];
    }
}
