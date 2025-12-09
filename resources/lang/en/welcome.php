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
            'artwork' => 'La Familia (The Family)',
            'video' => '/storage/videos/contributing-artists/fausto-bravo.mp4',
            'poster' => '/storage/videos/contributing-artists/posters/fausto-bravo.jpg'
        ],
        [
            'name' => 'Caro (Carolyn Hamilton)',
            'artwork' => 'Lirios Blancos (White Lilies)',
            'video' => '/storage/videos/contributing-artists/caro-carolyn-hamilton.mp4',
            'poster' => '/storage/videos/contributing-artists/posters/caro-carolyn-hamilton.jpg'
        ],
        [
            'name' => 'Scott Cushing',
            'artwork' => 'Photograph, Untitled',
            'video' => '/storage/videos/contributing-artists/scott-cushing.mp4',
            'poster' => '/storage/videos/contributing-artists/posters/scott-cushing.jpg'
        ],
        [
            'name' => 'Juan Fernando Garcia',
            'artwork' => 'Aqua (Water)',
            'video' => '/storage/videos/contributing-artists/juan-fernando.mp4',
            'poster' => '/storage/videos/contributing-artists/posters/juan-fernando.jpg'
        ],
        [
            'name' => 'Philip Hall',
            'artwork' => 'Napa Valley Vineyard with Mansion',
            'video' => '/storage/videos/contributing-artists/philip-hall.mp4',
            'poster' => '/storage/videos/contributing-artists/posters/philip-hall.jpg'
        ],
        [
            'name' => 'Jane Hiltbrand',
            'artwork' => 'Gustavo\'s Rooftop',
            'video' => '/storage/videos/contributing-artists/jane-hiltbrand.mp4',
            'poster' => '/storage/videos/contributing-artists/posters/jane-hiltbrand.jpg'
        ],
        [
            'name' => 'Hernán Illescas',
            'artwork' => 'El Venado (The Deer)',
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
            'artwork' => 'The Wounded Deer - Pop Version, Frida Tehuana - Schiaparelli Version, Frida with Earrings - Schiaparelli Version',
            'video' => '/storage/videos/contributing-artists/jesus-kahlo.mp4',
            'poster' => '/storage/videos/contributing-artists/posters/jesus-kahlo.jpg'
        ],
        [
            'name' => 'Cristian León',
            'artwork' => 'Paisaje de Cuatro Mundas y Rostros (Passage of Four Worlds and Faces), Tiempos de Pandemia (Pandemic Times)',
            'video' => '/storage/videos/contributing-artists/cristian-león.mp4',
            'poster' => '/storage/videos/contributing-artists/posters/cristian-león.jpg'
        ],
        [
            'name' => 'David Machado',
            'artwork' => 'Colibri y Flor (Hummingbird and Flower)',
            'video' => '/storage/videos/contributing-artists/david-mochado.mp4',
            'poster' => '/storage/videos/contributing-artists/posters/david-mochado.jpg'
        ],
        [
            'name' => 'Margot Manosalvas',
            'artwork' => 'Colibri y Lirio (Hummingbird and Lily), Colibris Magicas en la Naturaleza (Magical Hummingbirds in Nature)',
            'video' => '/storage/videos/contributing-artists/margo-manosalvos.mp4',
            'poster' => '/storage/videos/contributing-artists/posters/margo-manosalvos.jpg'
        ],
        [
            'name' => 'Eduardo Segovia',
            'artwork' => 'Botella Pajaro (Bird Bottle)',
            'video' => '/storage/videos/contributing-artists/eduardo-segovia.mp4',
            'poster' => '/storage/videos/contributing-artists/posters/eduardo-segovia.jpg'
        ],
        [
            'name' => 'Svetlana Sokolova',
            'artwork' => 'Metallic Dream, Meditation in Metal',
            'video' => '/storage/videos/contributing-artists/svetlana-sokolova.mp4',
            'poster' => '/storage/videos/contributing-artists/posters/svetlana-sokolova.jpg'
        ],
        [
            'name' => 'Candy Sugarman',
            'artwork' => 'Vessel, Untitled',
            'video' => '/storage/videos/contributing-artists/candy-sugarman.mp4',
            'poster' => '/storage/videos/contributing-artists/posters/candy-sugarman.jpg'
        ],
        [
            'name' => 'Christian Tigre',
            'artwork' => 'Picaflores (Hummingbirds)',
            'video' => '/storage/videos/contributing-artists/cristian-tigre.mp4',
            'poster' => '/storage/videos/contributing-artists/posters/cristian-tigre.jpg'
        ],
        [
            'name' => 'Lynne Zelasko',
            'artwork' => 'Asissi',
            'video' => '/storage/videos/contributing-artists/lynn-zelasko.mp4',
            'poster' => '/storage/videos/contributing-artists/posters/lynn-zelasko.jpg'
        ]
    ];
}

return [
    'rightPanel' => file_get_contents(__DIR__ . '/html-blocks/welcome/right-panel.html'),
    'contributingArtists' => contributingArtists()
];
