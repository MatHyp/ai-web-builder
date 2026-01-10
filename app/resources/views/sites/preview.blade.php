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

    </style>
</head>

<nav class="fixed top-0 left-0 z-50 w-full bg-white/80 backdrop-blur border-b border-gray-200">
    <div class="mx-auto max-w-7xl px-4">
        <div class="flex h-16 items-center justify-between">
            
            <a href="">
                <div class="text-lg font-bold text-gray-900">
                    {{ $site->title }}
                </div>
            </a>

            <div class="hidden md:flex space-x-6 text-sm font-medium">
                    @foreach($site->sections as $section)
                        <a href="#{{ $section->type }}" class="text-gray-700 hover:text-gray-900">
                            {{ ucfirst($section->type) }}
                        </a>

                    @endforeach

              
            </div>
        </div>
    </div>
</nav>


<body class="bg-gray-50 text-gray-900 antialiased">

    @foreach($site->sections as $section)
        <section id="{{ $section->type }}" class="scroll-mt-16">
            @if($section->type === 'hero')
                <x-hero :data="$section->data" />
            @elseif($section->type === 'about')
                <x-about :data="$section->data" />
            @elseif($section->type === 'services') <x-services :data="$section->data" />
            @elseif($section->type === 'features')
                <x-features :data="$section->data" />
            @elseif($section->type === 'pricing')  <x-pricing :data="$section->data" />
            @elseif($section->type === 'testimonials')
                <x-testimonials :data="$section->data" />
            @elseif($section->type === 'contact')
                <x-contact :data="$section->data" />
            @endif
        </section>
    @endforeach

    <footer class="bg-gray-900 text-white py-8 text-center">
        <p>&copy; {{ date('Y') }} {{ $site->title }}. Created with AI Builder.</p>
    </footer>

</body>
</html>