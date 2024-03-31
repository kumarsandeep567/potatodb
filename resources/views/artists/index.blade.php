@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-16">
        <div class="popular-artists">
            <h2 class="uppercase tracking-wider text-lg text-red-600 font-semibold">Popular Artists</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach($popularArtists as $artist)
                    <div class="artist mt-8">
                        <a href="{{ route('artists.show', $artist['id']) }}">
                            <img src="{{ $artist['profile_path'] }}" alt="artist_image"
                            class="hover:opacity-75 transition ease-in-out duration-150 rounded-md">
                        </a>
                        <div class="mt-2">
                            <a href="{{ route('artists.show', $artist['id']) }}" class="text-lg hover:text-red-600">{{ $artist['name'] }}</a>
                            <div class="text-sm truncate text-gray-600">{{ $artist['known_for'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="page-load-status my-8">
            <div class="flex justify-center">
                <div class="infinite-scroll-request my-8 text-4xl">Loading...</div>
                <div class="infinite-scroll-last my-8 text-4xl">That's it! That's all we have...</div>
                <div class="infinite-scroll-error my-8 text-4xl">Unfortunately an error occurred</div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js"></script>
    <script>
        let elem = document.querySelector('.grid');
        let infScroll = new InfiniteScroll( elem, {
            // options
            path: '/artists/page/@{{#}}',
            append: '.artist',
            checkLastPage: true,
            history: false,
            status: '.page-load-status'
        });
    </script>
@endsection