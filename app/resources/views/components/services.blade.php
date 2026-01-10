@props(['data'])

<section class="py-24 bg-gray-50 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-base font-semibold text-primary-600 tracking-wide uppercase">Oferta</h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                {{ $data['title'] ?? 'Nasze Usługi' }}
            </p>
            <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
                {{ $data['description'] ?? '' }}
            </p>
        </div>

        <div class="mt-16">
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @if(isset($data['services']) && is_array($data['services']))
                    @foreach($data['services'] as $service)
                    <div class="pt-6">
                        <div class="flow-root bg-white rounded-lg px-6 pb-8 h-full shadow-lg hover:shadow-xl transition-shadow duration-300 hover:-translate-y-1 transform transition-transform">
                            <div class="-mt-6">
                                <div>
                                    <span class="inline-flex items-center justify-center p-3 bg-primary-500 rounded-md shadow-lg">
                                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                        </svg>
                                    </span>
                                </div>
                                <h3 class="mt-8 text-lg font-medium text-gray-900 tracking-tight">{{ $service['title'] ?? 'Usługa' }}</h3>
                                <p class="mt-5 text-base text-gray-500">
                                    {{ $service['description'] ?? 'Krótki opis tej usługi.' }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>