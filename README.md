# AI Web Builder

A Laravel-based application that leverages Artificial Intelligence to generate fully responsive landing pages based on simple text descriptions. Built with FilamentPHP for the administration panel and Tailwind CSS for the frontend components.

## 🚀 Features

-   **User Isolation**: Users manage their own private workspace; sites are strictly scoped to the owner.
-   **AI-Powered Generation**:
    -   Analyzes user descriptions to determine business type.
    -   Automatically selects a color theme appropriate for the industry.
    -   Intelligently chooses relevant page sections (Hero, About, Services, Pricing, etc.).
    -   Generates unique, localized copy for all sections in Polish.
-   **Dynamic Rendering**: Real-time construction of HTML using modular Blade components.
-   **Public Preview**: Unique, shareable links (`/preview/{uuid}`) for every generated site.
-   **Responsive Design**: All generated components are mobile-first and styled with Tailwind CSS.

## 🛠 Tech Stack

-   **Framework**: Laravel 
-   **Admin Panel**: FilamentPHP 
-   **Frontend**: Blade Templates, Tailwind CSS
-   **AI Integration**: OpenRouter API (OpenAI Models)
-   **Database**: MySQL

## 🏗 How it Works

The application workflow is divided into four distinct steps:

### 1. Authentication & Scoped Access
Users must register and log in via the Filament Admin Panel:
-   All queries for `Sites` are automatically filtered by the authenticated user's ID.
-   A user can only view, edit, or delete websites they created.

### 2. AI Generation
The `SiteGeneratorService` sends the user's business description to the **OpenRouter API**. It uses a strict JSON schema to force the AI to return structured data (titles, paragraphs, theme) instead of unstructured text.

### 3. Database Storage
Data is stored in MySQL using three main models:
-   **User**: Handles authentication and ownership.
-   **Site**: Stores global project metadata (title, UUID, theme) and links to the User.
-   **SiteSection**: Stores individual page blocks. 

### 4. Dynamic Frontend Rendering
The public preview page (`/preview/{uuid}`) builds the website on the fly:
1.  It retrieves the site and its sections from the database.
2.  It loops through the sections and maps the `type` (e.g., 'hero') to the corresponding Blade component.
3.  It injects the stored JSON data into the component props to render the final HTML.

## 📂 Project Structure

A high-level overview of the key directories and architectural components:

```text
ai-web-builder/
├── app/
│   ├── AI/
│   │   ├── Prompts/
│   │   │   └── AIPrompt.php          # JSON Schemas and Prompt
│   │   └── Services/
│   │       └── OpenRouterAPI.php     # API Client
│   ├── Filament/
│   │   └── Resources/                # Admin Panel Logic (Forms, Tables)
│   ├── Http/
│   │   └── Controllers/
│   │       └── SiteController.php
│   ├── Models/
│   │   ├── Site.php                  # Main Site Model (1 side)
│   │   ├── SiteSection.php           # Individual Sections (N SiteSection - belongsTo Site)
│   │   └── User.php                  # User Model (Authentication)
│   ├── Services/
│   │   └── SiteGeneratorService.php  # Core Business Logic 
│   └── Providers/                    # Service Providers
├── config/
│   └── services.php                  # API Configuration
├── resources/
│   └── views/
│       ├── components/               # UI Blocks (Hero, About, Pricing, etc.)
│       └── sites/
│           └── preview.blade.php     # Main render template
└── routes/
    └── web.php                       # Application Routes
