<?php

namespace App\Http\Controllers;

use SpotifyWebAPI\Session;
use SpotifyWebAPI\SpotifyWebAPI;

class QuizController
{
    public function index()
    {
        // return view
        return view('welcome');
    }

    public function playlist()
    {
        // authenticate 
        $session = new SpotifyWebAPI\Session(
            env('SPOTIFY_CLIENT_ID'),
            env('SPOTIFY_CLIENT_SECRET'),
            env('SPOTIFY_REDIRECT_URI')
        );

        dd($session);
        // get playlist

        // return playlist tracks
    }
}
