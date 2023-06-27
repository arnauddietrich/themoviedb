<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){

        $articles = [
            [
                'titre' => 'Mon premier article',
                'content' => 'bla bla'
            ],
            [
                'titre' => 'Mon deuxième article',
                'content' => 'bla bla bla'
            ]
        ];

        return view('home', [
            'films' => $articles
        ]);

    }
}
