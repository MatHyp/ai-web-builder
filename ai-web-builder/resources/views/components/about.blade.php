@props(['data'])

<section class="py-16 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-base font-semibold text-primary-600 tracking-wide uppercase">
                O nas
            </h2>
            
            <p class="mt-1 text-4xl font-extrabold text-gray-900 sm:text-5xl sm:tracking-tight lg:text-6xl">
                {{ $data['title'] ?? 'Poznaj nas' }}
            </p>
            <div class="max-w-xl mt-5 mx-auto text-xl text-gray-500">
                <p>{{ $data['description'] ?? '' }}</p>
            </div>
        </div>
    </div>
</section>