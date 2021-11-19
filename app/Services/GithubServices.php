<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GithubServices
{
    public function __construct() {
    }

    /*get Emoji Github*/
    public function getEmoji() {
        $response = Http::get('https://api.github.com/emojis')->json();
        return $response;
    }
}