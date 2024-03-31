<div>
    <div class="mt-8">
        <a href="{{ route('movies.show', $movie['id']) }}">
            <img src="{{ $movie['poster_path'] }}" alt="moviePoster" id="my-image" class="hover:opacity-75 transition ease-in-out duration-150 rounded-md">
        </a>
        <div class="mt-2">
            <a href="{{ route('movies.show', $movie['id']) }}" class="text-lg hover:text-red-600">{{ $movie['title'] }}</a>
            <div class="flex items-center text-gray-600 text-sm mt-1">
                <span>
                    <img src="{{ asset('svg/star.svg') }}" alt="rating" class="fill-current" width="15px">
                </span>
                <span class="ml-1">{{ $movie['vote_average'] }}</span>
                <span class="mx-2">|</span>
                <span>{{ $movie['release_date'] }}</span>
            </div>
            <div class="text-gray-600 text-sm">
                {{ $movie['genres'] }}
            </div>
        </div>
    </div>
</div>