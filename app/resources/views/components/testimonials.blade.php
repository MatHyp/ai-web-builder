@props(['data'])

<section class="py-12 bg-white overflow-hidden md:py-20 lg:py-24">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
             <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                {{ $data['title'] ?? 'Opinie' }}
            </h2>
        </div>
        
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-2">
            @foreach($data['reviews'] ?? [] as $review)
            <div class="bg-gray-50 rounded-lg p-8 shadow-sm">
                <blockquote class="mt-6 md:flex-grow md:flex md:flex-col">
                    <div class="relative text-lg font-medium text-gray-700 md:flex-grow">
                        <svg class="absolute top-0 left-0 transform -translate-x-3 -translate-y-2 h-8 w-8 text-gray-200" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true">
                            <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
                        </svg>
                    <p class="relative">
                        {{-- Sprawdzamy kolejno: text, quote, description, content --}}
                        {{ $review['text'] ?? $review['quote'] ?? $review['description'] ?? $review['content'] ?? '' }}
                    </p>
                    </div>
                    <footer class="mt-8">
                        <div class="flex items-start">
                            <div class="ml-4">
                                <div class="text-base font-medium text-gray-900">{{ $review['author'] }}</div>
                            </div>
                        </div>
                    </footer>
                </blockquote>
            </div>
            @endforeach
        </div>
    </div>
</section>