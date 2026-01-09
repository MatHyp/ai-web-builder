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
    </style>
</head>
<body class="bg-gray-50 text-gray-900 antialiased">

    @foreach($site->sections as $section)
        
        @if($section->type === 'hero')
            <x-hero :data="$section->data" />
        @elseif($section->type === 'about')
            <x-about :data="$section->data" />
        @elseif($section->type === 'features')
            <x-features :data="$section->data" />
        @elseif($section->type === 'testimonials')
            <x-testimonials :data="$section->data" />
        @elseif($section->type === 'contact')
            <x-contact :data="$section->data" />
        @endif

    @endforeach

    <footer class="bg-gray-900 text-white py-8 text-center">
        <p>&copy; {{ date('Y') }} {{ $site->title }}. Created with AI Builder.</p>
    </footer>

</body>
</html>