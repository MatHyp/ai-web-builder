@props(['data'])

<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:flex-col sm:align-center">
            <h2 class="text-3xl font-extrabold text-gray-900 sm:text-center">{{ $data['title'] ?? 'Cennik' }}</h2>
            <p class="mt-5 text-xl text-gray-500 sm:text-center">{{ $data['description'] ?? 'Wybierz plan idealny dla Twoich potrzeb.' }}</p>
        </div>
        
        <div class="mt-12 space-y-4 sm:mt-16 sm:space-y-0 sm:grid sm:grid-cols-2 sm:gap-6 lg:max-w-4xl lg:mx-auto xl:max-w-none xl:mx-0 xl:grid-cols-3">
            @if(isset($data['plans']) && is_array($data['plans']))
                @foreach($data['plans'] as $plan)
                <div class="border border-gray-200 rounded-lg shadow-sm divide-y divide-gray-200 bg-white flex flex-col hover:border-indigo-500 transition-colors duration-300">
                    <div class="p-6 flex-1">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">{{ $plan['name'] ?? 'Pakiet' }}</h3>
                        
                        <p class="mt-4 flex items-baseline text-gray-900">
                            <span class="text-4xl font-extrabold tracking-tight">{{ $plan['price'] ?? '0' }}</span>
                            </p>

                        <ul role="list" class="mt-6 space-y-4">
                            @if(isset($plan['features']) && is_array($plan['features']))
                                @foreach($plan['features'] as $feature)
                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="ml-3 text-base text-gray-500">{{ $feature }}</span>
                                </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="p-6 bg-gray-50 rounded-b-lg mt-auto">
                        <a href="#contact" class="block w-full py-3 px-6 border border-transparent rounded-md shadow bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 text-center transition-colors">
                            Wybierz ten plan
                        </a>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</section>