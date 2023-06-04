<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $slides = [
            [
                'title' => 'Peliculas del momento',
                'content' => 'Por fin invasion',
                'image' => (asset('images/png/carrousel1.jpg')),
            ],
            [
                'title' => 'Suspendo',
                'content' => 'Un cuento oscuro.',
                'image' => (asset('images/png/carrousel12.jpg')),

            ],
            [
                'title' => 'Comedia',
                'content' => 'Zombies locos.',
                'image' => (asset('images/png/carrousel13.jpg')),

            ],
            // Agrega más elementos de slide según sea necesario
        ];

        return view('welcome', compact('slides'));
    }
}
