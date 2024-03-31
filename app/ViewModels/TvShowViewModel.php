<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;
use Carbon\Carbon;

class TvShowViewModel extends ViewModel
{
    public $tvshow;
    
    public function __construct($tvshow)
    {
        $this->tvshow = $tvshow;
    }

    public function tvshow()
    {
        return collect($this->tvshow)->merge([
            'poster_path' => 'https://image.tmdb.org/t/p/w500'.$this->tvshow['poster_path'],
            'vote_average' => ($this->tvshow['vote_average'] * 10).'%',
            'first_air_date' => Carbon::parse($this->tvshow['first_air_date'])->format('M d, Y'),
            'genres' => collect($this->tvshow['genres'])->pluck('name')->flatten()->implode(', '),
            'crew' => collect($this->tvshow['credits']['crew'])->take(2),
            'cast' => collect($this->tvshow['credits']['cast'])->reject(function ($cast) {

                // Some movies may have artists that do not have a profile image
                // In that case skip the ones that do not have the image and then take 
                // the first 5 cast members that have a profile image.

                return is_null($cast['profile_path']);
            })->take(5),
            'images' => collect($this->tvshow['images']['backdrops'])->take(9),
            'videos' => collect($this->tvshow['videos']['results'])->take(1)->pluck('key')->implode(''),
        ])->only([
            'id',
            'created_by',
            'genres',
            'overview',
            'poster_path',
            'first_air_date',
            'name',
            'vote_average',
            'cast',
            'crew',
            'videos',
            'images'
        ]);
    }
}
