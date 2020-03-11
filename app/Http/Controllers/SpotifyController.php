<?php

namespace App\Http\Controllers;

use SpotifyWebAPI\Session;
use SpotifyWebAPI\SpotifyWebAPI;

class SpotifyController extends Controller
{
    protected $spotifyAPI;

    public function __construct(SpotifyWebAPI $spotifyAPI)
    {
        $this->spotifyAPI = new SpotifyWebAPI();

        // use client id and secret to call spotify api
        $session = new Session(
            env('SPOTIFY_CLIENT_ID'),
            env('SPOTIFY_CLIENT_SECRET')
        );

        $session->requestCredentialsToken();
        $accessToken = $session->getAccessToken();
        $this->spotifyAPI->setSession($session);
        $accessToken = $session->getAccessToken();
    }

    public function playlist()
    {
        $options = [
            'scope' => [
                'playlist-read-private',
                'user-read-private',
            ],
        ];
        $playlist = $this->spotifyAPI->getPlaylistTracks(env('SPOTIFY_MUSICQUIZ_PLAYLIST'), $options);
        // track info for playlist:
        // $playlist --> items --> track --> external_urls --> spotify
        // https://open.spotify.com/track/0Dc7J9VPV4eOInoxUiZrsL?si=b8R3XGkxQrSTbIYRgByZuQ
        dd($playlist);
    }
}
