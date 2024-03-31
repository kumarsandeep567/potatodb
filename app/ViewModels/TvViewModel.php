<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;
use Carbon\Carbon;

class TvViewModel extends ViewModel
{
    public $popularTv, $topRatedTv, $genres;

    public function __construct($popularTv, $topRatedTv, $genres)
    {
        $this->popularTv = $popularTv;
        $this->topRatedTv = $topRatedTv;
        $this->genres = $genres;
    }

    public function popularTv()
    {
        return $this->formatTv($this->popularTv);
    }

    public function topRatedTv()
    {
        return $this->formatTv($this->topRatedTv);
    }

    public function genres()
    {
        return collect($this->genres)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
    }

    private function formatTv($tvshows)
    {
        return collect($tvshows)->map(function ($tvshow) {
            $formattedGenres = collect($tvshow['genre_ids'])->mapWithKeys(function ($value) {
                return [$value => $this->genres()->get($value)];
            })->implode(', ');

            return collect($tvshow)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w500'.$tvshow['poster_path'],
                'vote_average' => ($tvshow['vote_average'] * 10).'%',
                'first_air_date' => Carbon::parse($tvshow['first_air_date'])->format('M d, Y'),
                'genres' => $formattedGenres,
            ])->except([
                'genre_ids',
                'backdrop_path',
                'original_language',
                'original_title',
                'popularity',
                'vote_count'
            ]);
        });
    }
}
