<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViewModels\ArtistViewModel;
use App\ViewModels\ArtistsViewModel;
use Illuminate\Support\Facades\Http;

class ArtistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page = 1)
    {
        abort_if($page > 500, 204);

        $popularArtists = Http::withToken(config('services.tmdb.token'))
                        ->get('http://api.themoviedb.org/3/person/popular?page='.$page)
                        ->json()['results'];

        $viewModel = new ArtistsViewModel($popularArtists, $page);
        
        return view('artists.index', $viewModel);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artist = Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/person/'.$id)
                ->json();

        $social = Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/person/'.$id.'/external_ids')
                ->json();

        $credits = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/person/'.$id.'/combined_credits')
        ->json();

        $viewModel = new ArtistViewModel($artist, $social, $credits);

        return view('artists.show', $viewModel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
