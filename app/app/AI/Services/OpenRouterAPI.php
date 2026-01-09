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
        $apiKey = env('OPENROUTER_API_KEY');
        $apiUrl = env('OPENROUTER_API_URL');

        /** @var Response $response */
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
            'Content-Type' => 'application/json',
        ])->post($apiUrl, [
            'model' => 'openai/gpt-oss-20b:free',
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
