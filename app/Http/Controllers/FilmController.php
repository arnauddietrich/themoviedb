<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index(){

        //return view('welcome', []);
        return view('home', [
            'films' => Film::all()
        ]);

    }

    public function show(Film $film) {

        return view('film', [
            'article' => $film
        ]);

    }
    
    public function create() {

        $curl = curl_init();

        curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.themoviedb.org/3/trending/all/day?language=en-US",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "Authorization: Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIyMjJkNjNjZGRjMDY2ZDk5ZWQzZTgwNmQzMjY3MThjYSIsInN1YiI6IjYyNGVhNTRhYjc2Y2JiMDA2ODIzODc4YSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.zuuBq1c63XpADl8SQ_c62hezeus7VibE1w5Da5UdYyo",
            "accept: application/json"
        ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        }

        $data = json_decode($response, true);
        foreach($data['results'] as $film) {
            if(array_key_exists('genre_ids', $film))
                $film['genre_ids'] = json_encode($film['genre_ids']);
            if(array_key_exists('origin_country', $film))
                $film['origin_country'] = json_encode($film['origin_country']);
            Film::create($film);
        }

        echo 'Films ajoutés en base';
    }
}
