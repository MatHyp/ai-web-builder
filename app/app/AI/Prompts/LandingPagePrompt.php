<?php

namespace App\AI\Prompts;

class LandingPagePrompt
{
    public static function make(string $companyDescription): string
    {
        return <<<PROMPT
Jesteś asystentem tworzącym strukturę Landing Page dla firmy.

Opis firmy:
"$companyDescription"

Twoim zadaniem jest:
1. Wybrać odpowiednie sekcje z listy:
   - hero
   - about
   - features
   - testimonials
   - contact
2. Wygenerować treść dla każdej sekcji (tytuły, opisy).

Zwróć TYLKO czysty JSON w formacie:
[
    {
        "type": "hero",
        "data": {
            "title": "...",
            "subtitle": "...",
            "cta_text": "..."
        }
    }
]
PROMPT;
    }
}
