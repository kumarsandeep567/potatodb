<div class="relative mt-3 md:mt-0" x-data="{ isOpen: true }" @click.away="isOpen=false">
    <input 
        wire:model.debounce.500ms="search" 
        type="text" 
        class="border-2 
            border-black 
            bg-gray-200 
            transition 
            ease-in-out 
            text-sm 
            rounded-full 
            w-64 
            px-4 
            pl-8 
            py-1 
            focus:outline-none" 
        placeholder="Search"
        x-ref="search"
        @keydown.window="
            if(event.keyCode === 191){
                event.preventDefault();
                $refs.search.focus();
            }
        "
        @focus="isOpen=true"
        @keydown="isOpen=true"
        @keydown.escape.window="isOpen=false"
        @keydown.shift.tab="isOpen=false"
    >
    <div class="absolute top-1.5 ml-2">
        <img src="{{ asset('svg/search.svg') }}" width="18px">
    </div>
    <div 
        class="absolute bg-gray-200 text-sm rounded w-64 mt-3 z-10" 
        x-show.transition.opacity="isOpen"
    >
        <ul>
            @forelse($searchResults as $result)
                <li class="border-b border-red-600">
                    <a 
                        class="block hover:text-red-600 px-3 py-3 flex items-center"
                        @if($result['media_type'] === 'movie')
                            href="{{ route('movies.show', $result['id']) }}"
                        @elseif($result['media_type'] === 'tv')
                            href="{{ route('tv.show', $result['id']) }}"
                        @else
                            href="{{ route('artists.show', $result['id']) }}"
                        @endif 
                        @if($loop->last) 
                            @keydown.tab.exact="isOpen = false"
                        @endif
                    >
                        @empty($result['poster_path'])
                            @if($result['media_type'] === 'person' && !empty($result['profile_path']))
                                <img src="{{ 'https://image.tmdb.org/t/p/w92'.$result['profile_path']}}" alt="poster" class="w-8">
                            @else
                                <img src="{{ asset('img/placeholder_image.png') }}" alt="placeholder_image" class="w-8">
                            @endif
                        @else
                            <img src="{{ 'https://image.tmdb.org/t/p/w92'.$result['poster_path']}}" alt="poster" class="w-8">
                        @endempty
                        <span class="ml-4">
                            {{ $result['media_type'] === 'movie' ? $result['title'] : $result['name']}}
                        </span>
                    </a>
                </li>
            @empty
                @if(strlen($search) != 0)
                    <li>
                        <span class="block hover:bg-gray-700 px-3 py-3">No results found</span>
                    </li>
                @endif
            @endforelse
        </ul>
    </div>
</div>