<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class ArtistsViewModel extends ViewModel
{
    public $popularArtists;
    public $page;

    public function __construct($popularArtists, $page)
    {
        $this->popularArtists = $popularArtists;
        $this->page = $page;
    }

    public function popularArtists()
    {
        return collect($this->popularArtists)->map(function ($artist) {
            return collect($artist)->merge([
                'profile_path' => $artist['profile_path']
                ? 'https://image.tmdb.org/t/p/w235_and_h235_face'.$artist['profile_path']
                : 'https://ui-avatars.com/api/?size=235&name='.$artist['name'],
                'known_for' => collect($artist['known_for'])->where('media_type', 'movie')->pluck('title')->union(
                    collect($artist['known_for'])->where('media_type', 'tv')->pluck('name')
                )->implode(', '),
            ])->only([
                'id',
                'name',
                'profile_path',
                'known_for'
            ]);
        });
    }

    public function previous()
    {
        return ($this->page > 1) ? $this->page - 1 : NULL;
    }

    public function next()
    {
        return ($this->page < 500) ? $this->page + 1 : NULL;
    }
}
