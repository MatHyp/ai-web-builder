<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $site->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        html { scroll-behavior: smooth; }
    </style>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: tailwind.colors['{{ $site->theme ?? "indigo" }}'],
                    }
                }
            }
        }
    </script>
</head>



<body class="bg-gray-50 text-gray-900 antialiased">
    
    <!-- NAVIGATION BAR -->
    <x-navigation :site="$site" />

    <!-- SITE CONTENT BUILDER -->
    @foreach($site->sections as $section)
        <section id="{{ $section->type }}" class="scroll-mt-16">
            <x-dynamic-component 
                :component="$section->type" 
                :data="$section->data" 
            />
        </section>
    @endforeach

    <!-- FOOTER -->
    <footer class="bg-gray-900 text-white py-8 text-center">
        <p>&copy; {{ date('Y') }} {{ $site->title }}. Created with AI Builder.</p>
    </footer>

</body>
</html>