<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MovieCard extends Component
{
    public $movie;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($movie)
    {
        $this->movie = $movie;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.movie-card');
    }

    /**
         * NOTE: 
         * In Laravel 8 when a new component is created, it does not seem
         * to work on the first run (when the component is used just after
         * it has been created). 
         * It throws an error like this
         * "Unresolvable dependency resolving [Parameter #0 [ <required> $variableName ]] in class App\View\Components\ComponentName"
         * Why this error occurs is not known to me but there's a (weird) fix 
         * for this (Yes it is weird because after undoing the fix the error
         * does not occur anymore and this is the second time I'm encountering 
         * the same problem in Laravel 8)
         * 
         * Here's an example:
         * (In the terminal: php artisan make:component MovieCard)
         * 
         * In views/index.blade.php
         * <x-movie-card :movie="$movie" :genres="$genres" />
         * 
         * In app/view/components/MovieCard.php
         * class MovieCard extends Component
         * {
         *     public $movie;
         *     public $genres;
         *     public function __construct($movie, $genres)
         *     {
         *         $this->movie = $movie;
         *         $this->genres = $genres;
         *     }
         *     ...
         * }
         * 
         * Error:
         * Unresolvable dependency resolving [Parameter #0 [ <required> $movie ]] in class App\View\Components\MovieCard
         * 
         * FIX:
         * In the first run don't use quotes when including the component.
         * Do
         * <x-movie-card :movie=$movie :genres=$genres />
         * instead of
         * <x-movie-card :movie="$movie" :genres="$genres" />
         * 
         * This somehow manages to fix the error. Once the error has gone you can undo
         * the fix i.e. you can then use
         * <x-movie-card :movie="$movie" :genres="$genres" />
         * without any errors
        */
}