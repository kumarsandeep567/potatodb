@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 pt-16">
        <div class="popular-movies">
            <h2 class="uppercase tracking-wider text-lg text-red-600 font-semibold">Popular Movies</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach($popularMovies as $movie)
                    <x-movie-card :movie="$movie" />
                @endforeach 
            </div>
        </div>
        <div class="now-playing py-24">
            <h2 class="uppercase tracking-wider text-lg text-red-600 font-semibold">Now Playing</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                    @foreach($nowPlayingMovies as $nowPlaying)
                        <x-movie-card :movie="$nowPlaying" />
                    @endforeach
            </div>
        </div>
    </div>
@endsection