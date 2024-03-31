<div>
    <div class="mt-8">
        <a href="{{ route('tv.show', $tvshow['id']) }}">
            <img src="{{ $tvshow['poster_path'] }}" alt="tvPoster" id="my-image" class="hover:opacity-75 transition ease-in-out duration-150 rounded-md">
        </a>
        <div class="mt-2">
            <a href="{{ route('tv.show', $tvshow['id']) }}" class="text-lg hover:text-red-600">{{ $tvshow['name'] }}</a>
            <div class="flex items-center text-gray-600 text-sm mt-1">
                <span>
                    <img src="{{ asset('svg/star.svg') }}" alt="rating" class="fill-current" width="15px">
                </span>
                <span class="ml-1">{{ $tvshow['vote_average'] }}</span>
                <span class="mx-2">|</span>
                <span>{{ $tvshow['first_air_date'] }}</span>
            </div>
            <div class="text-gray-600 text-sm">
                {{ $tvshow['genres'] }}
            </div>
        </div>
    </div>
</div>