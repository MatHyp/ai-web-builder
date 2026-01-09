<?php

namespace App\AI\Prompts;

class AIPrompt
{
    public static function make(string $description): string
    {
        $schema = json_encode([
            [
                "type" => "hero",
                "data" => [
                    "title" => "Nagłówek sekcji hero",
                    "subtitle" => "Podtytuł",
                    "cta_text" => "Tekst przycisku"
                ]
            ],
            [
                "type" => "features",
                "data" => [
                    "title" => "Tytuł sekcji",
                    "items" => [ 
                        [
                            "icon" => "nazwa_ikony (np. coffee, check, star)",
                            "title" => "Tytuł cechy",
                            "description" => "Opis cechy"
                        ]
                    ]
                ]
            ],
            [
                "type" => "testimonials",
                "data" => [
                    "title" => "Tytuł sekcji",
                    "reviews" => [
                        [
                            "author" => "Imię Nazwisko",
                            "text" => "Treść opinii"
                        ]
                    ]
                ]
            ],
             [
                "type" => "about",
                "data" => [
                    "title" => "Tytuł",
                    "description" => "Opis firmy"
                ]
            ],
            [
                "type" => "contact",
                "data" => [
                    "title" => "Kontakt",
                    "description" => "Krótki opis",
                    "email" => "email",
                    "phone" => "telefon",
                    "address" => "adres",
                    "hours" => "godziny otwarcia"
                ]
            ]
        ]);

        return <<<EOT
        Jesteś doświadczonym copywriterem. 
        Twoim zadaniem jest wygenerowanie struktury strony Landing Page w formacie JSON dla firmy opisanej poniżej.

        OPIS FIRMY:
        "{$description}"

        INSTRUKCJE:
        1. Przeanalizuj opis firmy i dobierz odpowiednie treści.
        2. Zwróć WYŁĄCZNIE czysty JSON. Żadnego markdowna (```json), żadnego tekstu przed ani po.
        3. MUSISZ zachować dokładnie taką strukturę kluczy JSON (nie zmieniaj nazw pól jak 'text' na 'quote' ani 'items' na 'list'):

        {$schema}

        Wypełnij powyższy schemat kreatywną i sprzedażową treścią pasującą do opisu firmy.
        EOT;
    }
}