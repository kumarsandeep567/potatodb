@extends('layouts.app')

@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <div class="flex-none">
                <img src="{{ $artist['profile_path'] }}" alt="profileImage" class="w-76 rounded-md">
                <ul class="flex items-center mt-4">
                    @empty(!$social['facebook_id'])
                        <li>
                            <a href="{{ $social['facebook_id'] }}" title="facebook">
                                <img src="{{ asset('svg/facebook.svg') }}" alt="facebook" class="w-6">
                            </a>
                        </li>
                    @endempty
                    @empty(!$social['instagram_id'])
                        <li class="ml-4">
                            <a href="{{ $social['instagram_id'] }}" title="instagram">
                                <img src="{{ asset('svg/instagram.svg') }}" alt="instagram" class="w-6">
                            </a>
                        </li>
                    @endempty
                    @empty(!$social['twitter_id'])
                        <li class="ml-4">
                            <a href="{{ $social['twitter_id'] }}" title="twitter">
                                <img src="{{ asset('svg/twitter.svg') }}" alt="twitter" class="w-6">
                            </a>
                        </li>
                    @endempty
                    @empty(!$artist['homepage'])
                        <li class="ml-4">
                            <a href="{{ $artist['homepage'] }}" title="website">
                                <img src="{{ asset('svg/web_globe.svg') }}" alt="website" class="w-6">
                            </a>
                        </li>
                    @endempty
                </ul>
            </div>
            <div class="md:ml-24">
                <h2 class="text-4xl text-red-600 font-semibold">{{ $artist['name'] }}</h2>
                <div class="flex flex-wrap items-center text-gray-600 text-sm mt-1">
                    <span>
                        <img src="{{ asset('svg/cake.svg') }}" alt="rating" class="fill-current" width="15px">
                    </span>
                    <span class="ml-2 pt-1">{{ $artist['birthday'].' (age '.$artist['age'].') in '.$artist['place_of_birth'] }} </span>
                </div>
                <p class="text-gray-800 mt-8">
                    {{ $artist['biography'] }}
                </p>
                <h4 class="font-semibold mt-12">Known For</h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8">
                    @foreach($knownForTitles as $movie)
                        <div class="mt-4">
                            <a href="{{ $movie['url'] }}">
                                <img src="{{ $movie['poster_path'] }}" alt="poster" 
                                    class="hover:opacity-75 transition ease-in-out duration-150 rounded-md">
                            </a>
                            <a href="{{ $movie['url'] }}" class="text-sm leading-normal block text-gray-800 hover:text-red-600 mt-1">
                                {{ $movie['title'] }}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="credits border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl text-red-600 font-semibold">Credits</h2>
            <ul class="list-disc leading-loose pl-5 mt-8">
                @foreach ($credits as $credit)
                    <li>
                        {{ $credit['release_year'] }} 
                        &middot; 
                        <strong>
                            {{ $credit['title'] }}
                        </strong> 
                        as {{ empty($credit['character']) ? '(unknown/unavailable)' : $credit['character'] }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection