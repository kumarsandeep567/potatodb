@extends('layouts.app')

@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row ">
            <div class="flex-none">
                <img src="{{ $movie['poster_path'] }}" alt="moviePoster" class="w-64 md:w-96 rounded-md">
            </div>
            <div class="md:ml-24">
                <h2 class="text-4xl text-red-600 font-semibold">{{ $movie['title'] }}</h2>
                <div class="flex flex-wrap items-center text-gray-600 text-sm mt-1">
                    <span>
                        <img src="{{ asset('svg/star.svg') }}" alt="rating" class="fill-current" width="15px">
                    </span>
                    <span class="ml-1">{{ $movie['vote_average'] }}</span>
                    <span class="mx-2">|</span>
                    <span>{{ $movie['release_date'] }}</span>
                    <span class="mx-2">|</span>
                    <span>{{ $movie['media_type'] }}</span>
                    <span class="mx-2">|</span>
                    <span>{{ $movie['runtime'] }}</span>
                    <span class="mx-2">|</span>
                    <span>{{ $movie['genres'] }}</span>
                </div>
                <p class="text-gray-800 mt-8">
                    {{ $movie['overview'] }}
                </p>
                <div class="mt-12">
                    <h4 class="text-black font-semibold">Featured Cast</h4>
                    <div class="flex mt-4">
                        @foreach($movie['crew'] as $crew)
                            <div class="mr-8">
                                <div>{{ $crew['name'] }}</div>
                                <div class="text-sm text-gray-600">{{ $crew['job'] }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div x-data="{isOpen: false}">
                    @empty(!$movie['videos'])
                        <div class="mt-12">
                            <button 
                                @click="isOpen=true"
                                class="flex items-center border-2 border-red-600 text-red-600 rounded font-semibold px-5 py-4"
                            >
                                <img src="{{ asset('/svg/play-button.svg') }}" alt="play" width="20px" class="fill-current">
                                <span class="ml-2">Play trailer</span>
                            </button>
                        </div>
                        <div
                            style="background-color: rgba(0, 0, 0, .5);"
                            class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                            x-show.transition.opacity="isOpen"
                        >
                            <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                                <div class="bg-white rounded">
                                    <div class="flex justify-end pr-4 pt-2">
                                        <button
                                            @click="isOpen = false"
                                            @keydown.escape.window="isOpen = false"
                                            class="text-3xl leading-none hover:text-red-600">&times;
                                        </button>
                                    </div>
                                    <div class="modal-body px-8 py-8">
                                        <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
                                            <iframe 
                                                class="responsive-iframe absolute top-0 left-0 w-full h-full" 
                                                src="https://www.youtube.com/embed/{{ $movie['videos'] }}" 
                                                style="border:0;" 
                                                allow="autoplay; encrypted-media" 
                                                allowfullscreen>
                                            </iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endempty
                </div>
            </div>
        </div>
    </div>
    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl text-red-600 font-semibold">Cast</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach($movie['cast'] as $cast)
                    <div class="mt-8">
                        <a href="{{ route('artists.show', $cast['id']) }}">
                            <img src="{{ 'https://image.tmdb.org/t/p/w300'.$cast['profile_path'] }}" alt="artist" id="my-image" class="hover:opacity-75 transition ease-in-out duration-150 rounded-md">
                        </a>
                        <div class="mt-2">
                            <a href="{{ route('artists.show', $cast['id']) }}" class="text-lg hover:text-red-600">{{ $cast['name'] }}</a>
                            <div class="text-gray-600 text-sm">
                                {{ $cast['character'] }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="movie-images" x-data="{isOpen: false, image: ''}">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl text-red-600 font-semibold">Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach($movie['images'] as $image)
                    <div class="mt-8">
                        <a 
                            href="#" 
                            @click.prevent="
                                isOpen = true
                                image = '{{ 'https://image.tmdb.org/t/p/original'.$image['file_path'] }}'
                            "
                        >
                            <img src="{{ 'https://image.tmdb.org/t/p/w780'.$image['file_path'] }}" alt="image" class="hover:opacity-75 transition ease-in-out duration-150 rounded-sm">
                        </a>
                    </div>
                @endforeach
            </div>
            <div
                style="background-color: rgba(0, 0, 0, 0.5);"
                class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                x-show="isOpen"
            >
                <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                    <div class="bg-gray-200 rounded">
                        <div class="flex justify-end pr-4 pt-2">
                            <button
                                @click="isOpen = false"
                                @keydown.escape.window="isOpen = false"
                                class="text-3xl leading-none hover:text-red-600">&times;
                            </button>
                        </div>
                        <div class="modal-body px-8 py-8">
                            <img :src="image" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection