<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

use App\AI\Services\OpenRouterAPI; 
use App\AI\Prompts\AIPrompt;       

class SiteGeneratorService
{
    public function __construct(protected OpenRouterAPI $api) {}

    public function generate(string $description): array
    {
        $prompt = AIPrompt::make($description);

        $response = $this->api->apiCall($prompt);

        if (isset($response['error'])) {
             Log::error('AI Error', $response);
             throw new \Exception('Nie udało się połączyć z AI.');
        }

        $content = $response['choices'][0]['message']['content'] ?? '';
        
        $content = str_replace(['```json', '```'], '', $content);
        
        $data = json_decode($content, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception('AI zwróciło niepoprawny format danych.');
        }

        return $this->processSections($data);
    }

    protected function processSections(array $sections): array
    {
        $theme = 'indigo';
        $contentSections = [];

        foreach ($sections as $section) {
            if (($section['type'] ?? '') === 'theme_settings') {
                $theme = $section['data']['theme'] ?? 'indigo';
                continue;
            }
            $contentSections[] = $section;
        }

        return [
            'theme' => $theme,
            'sections' => $contentSections
        ];
    }
}