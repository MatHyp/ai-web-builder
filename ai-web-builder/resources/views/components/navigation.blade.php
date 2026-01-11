@props(['site'])

<nav class="fixed top-0 left-0 z-50 w-full bg-white/80 backdrop-blur border-b border-gray-200">
    <div class="mx-auto max-w-7xl px-4">
        <div class="flex h-16 items-center justify-between">
            
            <a href="#">
                <div class="text-lg font-bold text-gray-900">
                    {{ $site->title }}
                </div>
            </a>

            <div class="hidden md:flex space-x-6 text-sm font-medium">
                @foreach($site->sections as $section)
                    <a href="#{{ $section->type }}" class="text-gray-700 hover:text-gray-900 transition-colors">
                        {{ $section->label }}
                    </a>
                @endforeach
            </div>
            
            {{-- Opcjonalnie: Przycisk Hamburgera na mobile, jeśli będziesz chciał dodać później --}}
            <div class="md:hidden">
                </div>
        </div>
    </div>
</nav>