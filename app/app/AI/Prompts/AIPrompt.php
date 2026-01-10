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
            Twoim zadaniem jest stworzenie struktury Landing Page w formacie JSON dla firmy opisanej poniżej.

            OPIS FIRMY:
            "{$description}"

            ZASADY GENEROWANIA (BARDZO WAŻNE):
            1. Przeanalizuj opis firmy.
            2. Z poniższej "BIBLIOTEKI SEKCJI" wybierz TYLKO te sekcje, które pasują do opisu.
            3. Jeśli w opisie nie ma mowy o cenach lub konkretnych pakietach, NIE generuj sekcji 'pricing'.
            4. Jeśli opis jest bardzo krótki, wygeneruj tylko podstawowe sekcje (hero, about, contact).
            5. Zawsze zachowaj logiczną kolejność: Hero -> About -> Services/Features -> Pricing (jeśli jest) -> Testimonials -> Contact.
            6. Wypełnij pola `data` kreatywną treścią sprzedażową w języku polskim.

            BIBLIOTEKA DOSTĘPNYCH SEKCJI (SCHEMATY):
            {$schemaString}

            Twoja odpowiedź musi być TYLKO poprawnym tablicą JSON (Array of Objects).
            Nie dodawaj żadnego tekstu przed ani po JSON.
            Przykład struktury wyjściowej:
            [
                { "type": "hero", "data": { ... } },
                { "type": "about", "data": { ... } },
                { "type": "contact", "data": { ... } }
            ]
            EOT;
    }
}