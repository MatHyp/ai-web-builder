@props(['data'])

<section class="relative isolate bg-white px-6 pt-14 lg:px-8 min-h-[90vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
        <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
    </div>

    <div class="mx-auto max-w-4xl py-12 sm:py-20 lg:py-24">
        <div class="text-center">
            <h1 class="text-5xl font-extrabold tracking-tight text-gray-900 sm:text-7xl md:text-8xl mb-6">
                {{ $data['title'] ?? 'Witaj' }}
            </h1>
            
            <p class="mt-6 text-lg leading-8 text-gray-600 sm:text-xl md:text-2xl max-w-2xl mx-auto">
                {{ $data['subtitle'] ?? '' }}
            </p>
            
            <div class="mt-10 flex items-center justify-center gap-x-6">
                @if(isset($data['cta_text']))
                    <a href="#" class="rounded-md bg-primary-600 px-8 py-3.5 text-lg font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600 transition-all transform hover:scale-105">
                        {{ $data['cta_text'] }}
                    </a>
                @endif
                
                {{-- <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Dowiedz się więcej <span aria-hidden="true">→</span></a> --}}
            </div>
        </div>
    </div>

    <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]" aria-hidden="true">
        <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
    </div>
</section>