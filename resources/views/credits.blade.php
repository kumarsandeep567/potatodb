@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 pt-16">
        <div class="api-credits pb-10">
            <h2 class="uppercase tracking-wider text-lg text-red-600 font-semibold">API Credits</h2>
            <div class="px-10">
                <div class="mt-8 mr-7 p-8">
                    <div class="flex items-center">
                        <div class="pl-3">
                            <img src="{{ asset('svg/tmdb.svg') }}" alt="tmdb" width="450px" class="fill-current">
                        </div>
                        <div class="pl-24 grid grid-cols-1">
                            <div class="pb-5 text-lg"> 
                                {{ config('app.name', 'Laravel-App') }} utilizes the 
                                <a href="https://www.themoviedb.org/documentation/api" class="text-blue-600 hover:text-red-600 transition ease-in-out">API</a>
                                provided by 
                                <a href="https://www.themoviedb.org/" class="text-blue-600 hover:text-red-600 transition ease-in-out">The Movie Database (TMDb)</a>
                                to search and fetch the information regarding all known Movies, TV Shows and Artists.
                                This product is not endorsed or certified by TMDb.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="credits">
            <h2 class="uppercase tracking-wider text-lg text-red-600 font-semibold">Icon Credits</h2>
            <div class="px-10 grid grid-cols-2">
                <div class="mt-8 mr-7 p-8 pb-20 rounded-md shadow-md">
                    <div class="flex items-center">
                        <div class="pl-3">
                            <img src="{{ asset('svg/popcorn.svg') }}" alt="popcorn" width="200px" class="fill-current">
                        </div>
                        <div class="pl-24 grid grid-cols-1">
                            <div class="pb-5 text-lg">Designed by  
                                <a href="https://www.flaticon.com/authors/freepik" class="text-blue-600 hover:text-red-600 transition ease-in-out">Freepik</a>
                            </div>
                            <div class="pb-5 text-lg">Available on
                                <a href="https://www.flaticon.com/free-icon/popcorn_2933170" class="text-blue-600 hover:text-red-600 transition ease-in-out">Flaticon</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-8 mr-7 p-8 pb-20 rounded-md shadow-md">
                    <div class="flex items-center">
                        <div class="pl-3">
                            <img src="{{ asset('svg/search.svg') }}" alt="search" width="200px" class="fill-current">
                        </div>
                        <div class="pl-24 grid grid-cols-1">
                            <div class="pb-5 text-lg">Designed by  
                                <a href="https://www.flaticon.com/authors/pixel-perfect" class="text-blue-600 hover:text-red-600 transition ease-in-out">Pixel Perfect</a>
                            </div>
                            <div class="pb-5 text-lg">Available on
                                <a href="https://www.flaticon.com/free-icon/loupe_622669" class="text-blue-600 hover:text-red-600 transition ease-in-out">Flaticon</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-8 mr-7 p-8 pb-20 rounded-md shadow-md">
                    <div class="flex items-center">
                        <div class="pl-3">
                            <img src="{{ asset('svg/star.svg') }}" alt="star" width="200px" class="fill-current">
                        </div>
                        <div class="pl-24 grid grid-cols-1">
                            <div class="pb-5 text-lg">Designed by  
                                <a href="https://www.flaticon.com/authors/pixel-perfect" class="text-blue-600 hover:text-red-600 transition ease-in-out">Pixel Perfect</a>
                            </div>
                            <div class="pb-5 text-lg">Available on
                                <a href="https://www.flaticon.com/free-icon/star_1828884" class="text-blue-600 hover:text-red-600 transition ease-in-out">Flaticon</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-8 mr-7 p-8 pb-20 rounded-md shadow-md">
                    <div class="flex items-center">
                        <div class="pl-3">
                            <img src="{{ asset('svg/cake.svg') }}" alt="cake" width="200px" class="fill-current">
                        </div>
                        <div class="pl-24 grid grid-cols-1">
                            <div class="pb-5 text-lg">Designed by  
                                <a href="https://www.flaticon.com/authors/google" class="text-blue-600 hover:text-red-600 transition ease-in-out">Google</a>
                            </div>
                            <div class="pb-5 text-lg">Available on
                                <a href="https://www.flaticon.com/free-icon/cake_565415" class="text-blue-600 hover:text-red-600 transition ease-in-out">Flaticon</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-8 mr-7 p-8 pb-20 rounded-md shadow-md">
                    <div class="flex items-center">
                        <div class="pl-3">
                            <img src="{{ asset('svg/facebook.svg') }}" alt="facebook" width="200px" class="fill-current">
                        </div>
                        <div class="pl-24 grid grid-cols-1">
                            <div class="pb-5 text-lg">Designed by  
                                <a href="https://www.flaticon.com/authors/freepik" class="text-blue-600 hover:text-red-600 transition ease-in-out">Freepik</a>
                            </div>
                            <div class="pb-5 text-lg">Available on
                                <a href="https://www.flaticon.com/free-icon/facebook_1384021" class="text-blue-600 hover:text-red-600 transition ease-in-out">Flaticon</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-8 mr-7 p-8 pb-20 rounded-md shadow-md">
                    <div class="flex items-center">
                        <div class="pl-3">
                            <img src="{{ asset('svg/instagram.svg') }}" alt="instagram" width="200px" class="fill-current">
                        </div>
                        <div class="pl-24 grid grid-cols-1">
                            <div class="pb-5 text-lg">Designed by  
                                <a href="https://www.flaticon.com/authors/freepik" class="text-blue-600 hover:text-red-600 transition ease-in-out">Freepik</a>
                            </div>
                            <div class="pb-5 text-lg">Available on
                                <a href="https://www.flaticon.com/free-icon/instagram_1384031" class="text-blue-600 hover:text-red-600 transition ease-in-out">Flaticon</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-8 mr-7 p-8 pb-20 rounded-md shadow-md">
                    <div class="flex items-center">
                        <div class="pl-3">
                            <img src="{{ asset('svg/twitter.svg') }}" alt="twitter" width="200px" class="fill-current">
                        </div>
                        <div class="pl-24 grid grid-cols-1">
                            <div class="pb-5 text-lg">Designed by  
                                <a href="https://www.flaticon.com/authors/freepik" class="text-blue-600 hover:text-red-600 transition ease-in-out">Freepik</a>
                            </div>
                            <div class="pb-5 text-lg">Available on
                                <a href="https://www.flaticon.com/free-icon/twitter_1384033" class="text-blue-600 hover:text-red-600 transition ease-in-out">Flaticon</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-8 mr-7 p-8 pb-20 rounded-md shadow-md">
                    <div class="flex items-center">
                        <div class="pl-3">
                            <img src="{{ asset('svg/web_globe.svg') }}" alt="web_globe" width="200px" class="fill-current">
                        </div>
                        <div class="pl-24 grid grid-cols-1">
                            <div class="pb-5 text-lg">Designed by  
                                <a href="https://www.flaticon.com/authors/vitaly-gorbachev" class="text-blue-600 hover:text-red-600 transition ease-in-out">Vitaly Gorbachev</a>
                            </div>
                            <div class="pb-5 text-lg">Available on
                                <a href="https://www.flaticon.com/free-icon/globe_2301129" class="text-blue-600 hover:text-red-600 transition ease-in-out">Flaticon</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-8 mr-7 p-8 pb-20 rounded-md shadow-md">
                    <div class="flex items-center">
                        <div class="pl-3">
                            <img src="{{ asset('svg/play-button.svg') }}" alt="play-button" width="200px" class="fill-current">
                        </div>
                        <div class="pl-24 grid grid-cols-1">
                            <div class="pb-5 text-lg">Designed by  
                                <a href="https://www.flaticon.com/authors/freepik" class="text-blue-600 hover:text-red-600 transition ease-in-out">Freepik</a>
                            </div>
                            <div class="pb-5 text-lg">Available on
                                <a href="https://www.flaticon.com/free-icon/play-button_375" class="text-blue-600 hover:text-red-600 transition ease-in-out">Flaticon</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection