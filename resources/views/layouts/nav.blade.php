<nav class="shadow-md">
    <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4 py-6">
        {{-- Left side of the navbar --}}
        <ul class="flex flex-col md:flex-row items-center">
            <li>
                <a class="flex mb-3 md:mb-0 items-center" href="{{ url('/') }}">
                    <img src="{{ asset('svg/popcorn.svg') }}" alt="PotatoDB" width="40px">
                    <p class="pl-3 font-mono">{{ config('app.name', 'Laravel-App') }}</p>
                </a>
            </li>
            <li class="md:ml-16 mt-3 md:mt-0">
                <a href="{{ route('movies.index') }}" class="hover:text-red-600 transition ease-in-out">Movies</a>
            </li>
            <li class="md:ml-6 mt-3 md:mt-0">
                <a href="{{ route('tv.index') }}" class="hover:text-red-600 transition ease-in-out">TV Shows</a>
            </li>
            <li class="md:ml-6 mt-3 md:mt-0">
                <a href="{{ route('artists.index') }}" class="hover:text-red-600 transition ease-in-out">Artists</a>
            </li>
        </ul>
        {{-- Right side of the navbar --}}
        <div class="flex flex-col md:flex-row items-center">
            <livewire:search-dropdown/>
            <div class="md:ml-4 mt-3 md:mt-0">
                <a href="{{ route('credits') }}">
                    <img src="{{ asset('img/user.png') }}" 
                        alt="avatar" 
                        class="rounded-full w-8 h-8 p-0.5 bg-gray-100 hover:bg-red-300 transition ease-in-out"
                    >
                </a>
            </div>
        </div>
    </div>
</nav>