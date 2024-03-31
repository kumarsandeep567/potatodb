<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;
use Carbon\Carbon;

class ArtistViewModel extends ViewModel
{
    public $artist, $social, $credits;

    public function __construct($artist, $social, $credits)
    {
        $this->artist = $artist;
        $this->social = $social;
        $this->credits = $credits;
    }

    public function artist()
    {
        return collect($this->artist)->merge([
            'birthday' => Carbon::parse($this->artist['birthday'])->format('M d, Y'),
            'age' => Carbon::parse($this->artist['birthday'])->age,
            'profile_path' => $this->artist['profile_path']
                ? 'https://image.tmdb.org/t/p/w300'.$this->artist['profile_path']
                : 'https://ui-avatars.com/api/?size=300&name='.e($this->artist['name']),
        ]);
    }

    public function social()
    {
        return collect($this->social)->merge([
            'twitter_id' => $this->social['twitter_id'] ? 'https://www.twitter.com/'.$this->social['twitter_id'] : NULL,
            'facebook_id' => $this->social['facebook_id'] ? 'https://www.facebook.com/'.$this->social['facebook_id'] : NULL,
            'instagram_id' => $this->social['instagram_id'] ? 'https://www.instagram.com/'.$this->social['instagram_id'] : NULL,
        ])->only(['twitter_id', 'facebook_id', 'instagram_id']);
    }

    public function knownForTitles()
    {
        $castMovies = collect($this->credits)->get('cast');
        return collect($castMovies)->sortByDesc('popularity')->take(5)->map(function ($movie) {
            if(isset($movie['title']))
            {
                $title = $movie['title'];
            }
            elseif($movie['name'])
            {
                $title = $movie['name'];
            }
            else
            {
                $title = 'Untitled';
            }
            return collect($movie)->merge([
                'poster_path' => $movie['poster_path']
                    ? 'https://image.tmdb.org/t/p/w185'.$movie['poster_path']
                    : asset('/img/placeholder_image_185x278.png'),
                'title' => $title,
                'url' => $movie['media_type'] === 'movie' 
                ? route('movies.show', $movie['id'])
                : route('tv.show', $movie['id'])
            ])->only(['id', 'title', 'poster_path', 'media_type', 'popularity', 'url']);
        });
    }

    public function credits()
    {
        $castMovies = collect($this->credits)->get('cast');
        return collect($castMovies)->map(function ($movie) {
            if(isset($movie['release_date']))
            {
                $releaseDate = $movie['release_date'];
            }
            elseif(isset($movie['first_air_date']))
            {
                $releaseDate = $movie['first_air_date'];
            }
            else
            {
                $releaseDate = '';
            }

            if(isset($movie['title']))
            {
                $title = $movie['title'];
            }
            elseif($movie['name'])
            {
                $title = $movie['name'];
            }
            else
            {
                $title = 'Untitled';
            }

            return collect($movie)->merge([
                'release_date' => $releaseDate,
                'release_year' => isset($releaseDate) ? Carbon::parse($releaseDate)->format('Y') : 'Future',
                'title' => $title,
                'character' => isset($movie['character']) ? $movie['character'] : '',
            ])->only(['id', 'title', 'character', 'release_date', 'release_year', 'media_type']);
        })->sortByDesc('release_year');
    }
}