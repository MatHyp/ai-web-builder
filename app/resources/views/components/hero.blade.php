@props(['data'])

<section class="relative bg-white overflow-hidden min-h-[90vh] flex items-center">
    <div class="max-w-7xl mx-auto w-full">
        <div class="relative z-10 bg-white lg:max-w-2xl lg:w-full pb-12 lg:pb-0">
            <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-12">
                <div class="sm:text-center lg:text-left">
                    <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                        <span class="block xl:inline">{{ $data['title'] ?? 'Witaj' }}</span>
                    </h1>
                    <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                        {{ $data['subtitle'] ?? '' }}
                    </p>
                    <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                        @if(isset($data['cta_text']))
                        <div class="rounded-md shadow">
                            <a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                                {{ $data['cta_text'] }}
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </main>
        </div>
    </div>
    
    <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2 bg-gray-100 h-full lg:rounded-tl-full lg:rounded-bl-full overflow-hidden shadow-xl lg:ml-12">
        <img 
            src="{{ $data['image_url'] ?? 'https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&auto=format&fit=crop&w=2850&q=80' }}" 
            alt="{{ $data['title'] ?? 'Hero image' }}"
            class="h-full w-full object-cover object-center"
        >
    </div>
</section>