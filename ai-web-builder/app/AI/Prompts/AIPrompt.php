<?php

namespace App\AI\Prompts;

class AIPrompt
{
    public static function make(string $description): string
    {
        $sectionSchemas = [
            'hero' => [
                "type" => "hero",
                "data" => [
                    "title" => "Nagłówek sekcji hero",
                    "subtitle" => "Podtytuł",
                    "cta_text" => "Tekst przycisku"
                ]
            ],
            'about' => [
                "type" => "about",
                "data" => [
                    "title" => "Tytuł sekcji o nas",
                    "description" => "Opis firmy"
                ]
            ],
            'services' => [
                "type" => "services",
                "data" => [
                    "title" => "Nasze usługi",
                    "description" => "Krótki wstęp do usług",
                    "services" => [
                        [
                            "title" => "Nazwa usługi",
                            "description" => "Opis usługi",
                            "icon" => "nazwa_ikony"
                        ]
                    ]
                ]
            ],
            'pricing' => [
                "type" => "pricing",
                "data" => [
                    "title" => "Cennik",
                    "description" => "Opis cennika",
                    "plans" => [
                        [
                            "name" => "Nazwa pakietu (np. Basic)",
                            "price" => "Cena (np. 100 zł)",
                            "features" => ["cecha 1", "cecha 2"]
                        ]
                    ]
                ]
            ],
            'features' => [
                "type" => "features",
                "data" => [
                    "title" => "Dlaczego my?",
                    "items" => [
                        [
                            "icon" => "nazwa_ikony",
                            "title" => "Cecha",
                            "description" => "Opis"
                        ]
                    ]
                ]
            ],
            'testimonials' => [
                "type" => "testimonials",
                "data" => [
                    "title" => "Opinie klientów",
                    "reviews" => [
                        [
                            "author" => "Imię Nazwisko",
                            "text" => "Opinia"
                        ]
                    ]
                ]
            ],
            'contact' => [
                "type" => "contact",
                "data" => [
                    "title" => "Kontakt",
                    "email" => "email",
                    "phone" => "telefon",
                    "address" => "adres"
                ]
            ]
        ];

        $schemaString = json_encode($sectionSchemas, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        return <<<EOT
            Jesteś architektem stron internetowych i copywriterem.
            Twoim zadaniem jest stworzenie struktury Landing Page w formacie JSON dla firmy opisanej poniżej oraz dobranie kolorystyki.

            OPIS FIRMY:
            "{$description}"

            DOSTĘPNE KOLORY:
            [slate, gray, zinc, neutral, stone, red, orange, amber, yellow, lime, green, emerald, teal, cyan, sky, blue, indigo, violet, purple, fuchsia, pink, rose]

            ZASADY GENEROWANIA (BARDZO WAŻNE):
            1. Przeanalizuj opis i wybierz jeden kolor z listy powyżej, który najlepiej oddaje charakter branży (np. natura = green, technologia = blue, energia = red).
            2. Z poniższej "BIBLIOTEKI SEKCJI" wybierz TYLKO te sekcje, które pasują do opisu.
            3. Jeśli w opisie nie ma mowy o cenach lub konkretnych pakietach, NIE generuj sekcji 'pricing'.
            4. Jeśli opis jest bardzo krótki, wygeneruj tylko podstawowe sekcje (hero, about, contact).
            5. Zawsze zachowaj logiczną kolejność sekcji.
            6. Wypełnij pola `data` kreatywną treścią sprzedażową w języku polskim.

            BIBLIOTEKA DOSTĘPNYCH SEKCJI (SCHEMATY):
            {$schemaString}

            FORMAT ODPOWIEDZI (WYMAGANY):
            Twoja odpowiedź musi być TYLKO poprawną tablicą JSON.
            
            BARDZO WAŻNE: Pierwszym elementem tablicy MUSI BYĆ obiekt definiujący wybrany kolor w formacie:
            { "type": "theme_settings", "data": { "theme": "nazwa_wybranego_koloru" } }

            Dopiero po nim następują wybrane sekcje strony.

            Przykład struktury wyjściowej:
            [
                { "type": "theme_settings", "data": { "theme": "red" } },
                { "type": "hero", "data": { ... } },
                { "type": "about", "data": { ... } },
                { "type": "contact", "data": { ... } }
            ]
            EOT;
    }
}