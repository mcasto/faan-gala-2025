<?php

use Illuminate\Support\Facades\Storage;

function clapboards()
{
    $files = Storage::disk('public')
        ->files('images/clapboard-dogs');

    shuffle($files);

    return collect($files)->map(function ($file) {
        return "/storage/{$file}";
    });
}

function contributingArtists()
{
    return [
        [
            'name' => 'Gonzalo Arce',
            'artwork' => 'Black Beauty',
            'video' => '/storage/videos/contributing-artists/gonzalo-arce.mp4',
            'poster' => '/storage/videos/contributing-artists/posters/gonzalo-arce.jpg'
        ],
        [
            'name' => 'Fausto Bravo',
            'artwork' => 'La Familia',
            'video' => '/storage/videos/contributing-artists/fausto-bravo.mp4',
            'poster' => '/storage/videos/contributing-artists/posters/fausto-bravo.jpg'
        ],
        [
            'name' => 'Caro (Carolyn Hamilton)',
            'artwork' => 'Lirios Blancos',
            'video' => '/storage/videos/contributing-artists/caro-carolyn-hamilton.mp4',
            'poster' => '/storage/videos/contributing-artists/posters/caro-carolyn-hamilton.jpg'
        ],
        [
            'name' => 'Catalina Carrasco',
            'artwork' => 'El Nuevo Mundo, El Pajarito, Sirena',
            'video' => null, // Video pendiente
            'poster' => '/storage/videos/contributing-artists/posters/catalina-carrasco.jpg'
        ],
        [
            'name' => 'Scott Cushing',
            'artwork' => 'Fotografía, Sin Título',
            'video' => '/storage/videos/contributing-artists/scott-cushing.mp4',
            'poster' => '/storage/videos/contributing-artists/posters/scott-cushing.jpg'
        ],
        [
            'name' => 'Juan Fernando Garcia',
            'artwork' => 'Agua',
            'video' => '/storage/videos/contributing-artists/juan-fernando.mp4',
            'poster' => '/storage/videos/contributing-artists/posters/juan-fernando.jpg'
        ],
        [
            'name' => 'Philip Hall',
            'artwork' => 'Viñedo de Napa Valley con Mansión',
            'video' => '/storage/videos/contributing-artists/philip-hall.mp4',
            'poster' => '/storage/videos/contributing-artists/posters/philip-hall.jpg'
        ],
        [
            'name' => 'Jane Hiltbrand',
            'artwork' => 'La Azotea de Gustavo',
            'video' => '/storage/videos/contributing-artists/jane-hiltbrand.mp4',
            'poster' => '/storage/videos/contributing-artists/posters/jane-hiltbrand.jpg'
        ],
        [
            'name' => 'Hernán Illescas',
            'artwork' => 'El Venado',
            'video' => '/storage/videos/contributing-artists/hernán-illescas.mp4',
            'poster' => '/storage/videos/contributing-artists/posters/hernán-illescas.jpg'
        ],
        [
            'name' => 'Miguel Illescas',
            'artwork' => 'Aya Huma',
            'video' => '/storage/videos/contributing-artists/miguel-illescas.mp4',
            'poster' => '/storage/videos/contributing-artists/posters/miguel-illescas.jpg'
        ],
        [
            'name' => 'Jesus Kahlo',
            'artwork' => 'El Venado Herido - Versión Pop, Frida Tehuana - Versión Schiaparelli, Frida con Aretes - Versión Schiaparelli',
            'video' => '/storage/videos/contributing-artists/jesus-kahlo.mp4',
            'poster' => '/storage/videos/contributing-artists/posters/jesus-kahlo.jpg'
        ],
        [
            'name' => 'Cristian León',
            'artwork' => 'Paisaje de Cuatro Mundos y Rostros, Tiempos de Pandemia',
            'video' => '/storage/videos/contributing-artists/cristian-león.mp4',
            'poster' => '/storage/videos/contributing-artists/posters/cristian-león.jpg'
        ],
        [
            'name' => 'David Machado',
            'artwork' => 'Colibrí y Flor',
            'video' => '/storage/videos/contributing-artists/david-mochado.mp4',
            'poster' => '/storage/videos/contributing-artists/posters/david-mochado.jpg'
        ],
        [
            'name' => 'Margot Manosalvas',
            'artwork' => 'Colibrí y Lirio, Colibríes Mágicos en la Naturaleza',
            'video' => '/storage/videos/contributing-artists/margo-manosalvos.mp4',
            'poster' => '/storage/videos/contributing-artists/posters/margo-manosalvos.jpg'
        ],
        [
            'name' => 'Eduardo Segovia',
            'artwork' => 'Botella Pájaro',
            'video' => '/storage/videos/contributing-artists/eduardo-segovia.mp4',
            'poster' => '/storage/videos/contributing-artists/posters/eduardo-segovia.jpg'
        ],
        [
            'name' => 'Svetlana Sokolova',
            'artwork' => 'Sueño Metálico, Meditación en Metal',
            'video' => '/storage/videos/contributing-artists/svetlana-sokolova.mp4',
            'poster' => '/storage/videos/contributing-artists/posters/svetlana-sokolova.jpg'
        ],
        [
            'name' => 'Candy Sugarman',
            'artwork' => 'Vasija, Sin Título',
            'video' => '/storage/videos/contributing-artists/candy-sugarman.mp4',
            'poster' => '/storage/videos/contributing-artists/posters/candy-sugarman.jpg'
        ],
        [
            'name' => 'Christian Tigre',
            'artwork' => 'Picaflores',
            'video' => '/storage/videos/contributing-artists/cristian-tigre.mp4',
            'poster' => '/storage/videos/contributing-artists/posters/cristian-tigre.jpg'
        ],
        [
            'name' => 'Lynne Zelasko',
            'artwork' => 'Asís',
            'video' => '/storage/videos/contributing-artists/lynn-zelasko.mp4',
            'poster' => '/storage/videos/contributing-artists/posters/lynn-zelasko.jpg'
        ]
    ];
}

return [
    'rightPanel' => file_get_contents(__DIR__ . '/html-blocks/welcome/right-panel.html'),
    'contributingArtists' => contributingArtists()
];
