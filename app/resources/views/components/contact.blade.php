@props(['data'])

<section class="bg-gray-100 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-lg mx-auto md:max-w-none md:grid md:grid-cols-2 md:gap-8">
            <div>
                <h2 class="text-2xl font-extrabold text-gray-900 sm:text-3xl">
                    {{ $data['title'] ?? 'Kontakt' }}
                </h2>
                <div class="mt-3">
                    <p class="text-lg text-gray-500">
                        {{ $data['description'] ?? '' }}
                    </p>
                </div>
                <div class="mt-9">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <div class="ml-3 text-base text-gray-500">
                            <p>{{ $data['phone'] ?? '' }}</p>
                        </div>
                    </div>
                    <div class="mt-6 flex">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div class="ml-3 text-base text-gray-500">
                            <p>{{ $data['email'] ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-12 sm:mt-16 md:mt-0 bg-white rounded-lg shadow-lg p-8">
                <h3 class="text-lg font-medium text-gray-900">Godziny otwarcia</h3>
                <p class="mt-2 text-base text-gray-500">
                    {{ $data['hours'] ?? '' }}
                </p>
                
                <h3 class="mt-6 text-lg font-medium text-gray-900">Adres</h3>
                <p class="mt-2 text-base text-gray-500">
                    {{ $data['address'] ?? '' }}
                </p>
            </div>
        </div>
    </div>
</section>