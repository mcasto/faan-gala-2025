<?php
$levels = [
    'mgm' => [
        'title' => 'Estudios MGM',
        'amount' => '$25,000',
        'value' => 25000,
        'benefits' => [
            '2 mesas para la GALA FAAN-tástica (16 invitados)',
            '16 invitaciones VIP para la hora del champagne',
            'Patrocinio de página completa en el programa de la gala',
            'Nombrado como patrocinador del evento',
            'Reconocimiento de nombre y logo en todas las promociones del evento',
            'Reconocimiento por el presentador con banner en el escenario',
            'Reconocimiento en la revista FAAN'
        ]
    ],
    'paramount' => [
        'title' => 'Paramount Pictures',
        'amount' => '$10,000',
        'value' => 10000,
        'benefits' => [
            '2 mesas para la GALA FAAN-tástica (16 invitados)',
            '16 invitaciones VIP para la hora del champagne',
            'Anuncio de media página en el programa de la gala',
            'Reconocimiento de nombre y logo en todas las promociones del evento como Benefactor de $10,000',
        ]
    ],
    'warner' => [
        'title' => 'Warner Bros',
        'amount' => '$5,000',
        'value' => 5000,
        'benefits' => [
            '1 mesa para la GALA FAAN-tástica (8 invitados)',
            '8 invitaciones VIP para la hora del champagne',
            'Anuncio de media página en el programa de la gala',
            'Reconocimiento de nombre y logo en todas las promociones del evento como Benefactor de $5,000',
        ]
    ],
    'century' => [
        'title' => '20th Century Fox',
        'amount' => '$2,500',
        'value' => 2500,
        'benefits' => [
            '4 entradas para la GALA FAAN-tástica',
            '4 invitaciones VIP para la hora del champagne',
            'Anuncio de cuarto de página en el programa de la gala',
            'Nombre listado en materiales impresos como Benefactor de $2,500',
        ]
    ],
    'united' => [
        'title' => 'Universal Artists',
        'amount' => '$1,000',
        'value' => 1000,
        'benefits' => [
            '2 entradas para la GALA FAAN-tástica',
            '2 invitaciones VIP para la hora del champagne',
            'Nombre listado en materiales impresos como Benefactor de $1,000',
        ]
    ],
];

usort($levels, function ($a, $b) {
    return $b['value'] < $a['value'] ? 1 : -1;
});

return [
    'header' => 'GALA FAAN-TÁSTICA',
    'date' => '22 de Noviembre de 2025',
    'location' => 'Estancia Rosario',
    'note' => '* El patrocinio incluye donación en efectivo y cualquier costo directo del evento, incluyendo Bar de la Gala (donación de licor), costos de impresión o costos de entretenimiento.',
    'levels' => $levels
];
