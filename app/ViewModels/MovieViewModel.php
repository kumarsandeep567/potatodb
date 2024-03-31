<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class MovieViewModel extends ViewModel
{
    public $movie;
    
    public function __construct($movie)
    {
        $this->movie = $movie;
    }

    public function movie()
    {
        return collect($this->movie)->merge([
            'poster_path' => 'https://image.tmdb.org/t/p/w500'.$this->movie['poster_path'],
            'vote_average' => ($this->movie['vote_average'] * 10).'%',
            'release_date' => Carbon::parse($this->movie['release_date'])->format('M d, Y'),
            'genres' => collect($this->movie['genres'])->pluck('name')->flatten()->implode(', '),
            'crew' => collect($this->movie['credits']['crew'])->take(2),
            'cast' => collect($this->movie['credits']['cast'])->reject(function ($cast) {

                // Some movies may have artists that do not have a profile image
                // In that case skip the ones that do not have the image and then take 
                // the first 5 cast members that have a profile image.

                return is_null($cast['profile_path']);
            })->take(5),
            'images' => collect($this->movie['images']['backdrops'])->take(9),
            'videos' => collect($this->movie['videos']['results'])->take(1)->pluck('key')->implode(''),
            'media_type' => empty($movie['title']) ? 'Movie' : 'TV',
            'runtime' => intdiv($this->movie['runtime'], 60)."h ".($this->movie['runtime'] % 60)."min",
        ])->only([
            'id',
            'title',
            'media_type',
            'overview',
            'genres',
            'runtime',
            'poster_path',
            'release_date',
            'vote_average',
            'cast',
            'crew',
            'videos',
            'images',
        ]);
    }
}
