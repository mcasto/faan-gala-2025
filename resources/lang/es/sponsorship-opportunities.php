<?php
$levels = [
    'mgm' => [
        'title' => 'MGM Studios',
        'amount' => '$25,000',
        'value' => 25000,
        'benefits' => [
            '2 mesas para GALA FAAN-tastica (16 invitados)',
            '16 invitaciones VIP para la hora del champán',
            'Patrocinio de página completa en el programa de la gala',
            'Nombrado como patrocinador del evento',
            'Reconocimiento del nombre y logotipo en todas las promociones del evento',
            'Reconocimiento por parte del presentador con pancarta en el escenario',
            'Reconocimiento en la revista FAAN'
        ]
    ],
    'paramount' => [
        'title' => 'Paramount Pictures',
        'amount' => '$10,000',
        'value' => 10000,
        'benefits' => [
            '2 mesas para GALA FAAN-tastica (16 invitados)',
            '16 invitaciones VIP para la hora del champán',
            'Anuncio de media página en el programa de la gala',
            'Reconocimiento del nombre y logotipo en todas las promociones del evento como Benefactor de $10,000',
        ]
    ],
    'warner' => [
        'title' => 'Warner Bros',
        'amount' => '$5,000',
        'value' => 5000,
        'benefits' => [
            '1 mesa para GALA FAAN-tastica (8 invitados)',
            '8 invitaciones VIP para la hora del champán',
            'Anuncio de media página en el programa de la gala',
            'Reconocimiento del nombre y logotipo en todas las promociones del evento como Benefactor de $5,000',
        ]
    ],
    'century' => [
        'title' => '20th Century Fox',
        'amount' => '$2,500',
        'value' => 2500,
        'benefits' => [
            '4 entradas para GALA FAAN-tastica',
            '4 invitaciones VIP para la hora del champán',
            'Anuncio de un cuarto de página en el programa de la gala',
            'Nombre que aparecerá en los materiales impresos como Benefactor de $2,500',
        ]
    ],
    'united' => [
        'title' => 'Universal Artists',
        'amount' => '$1,000',
        'value' => 1000,
        'benefits' => [
            '2 entradas para GALA FAAN-tastica',
            '2 invitaciones VIP para la hora del champán',
            'Nombre que aparecerá en los materiales impresos como Benefactor de $1,000',
        ]
    ],
];

usort($levels, function ($a, $b) {
    return $b['value'] < $a['value'] ? 1 : -1;
});

return [
    'header' => 'GALA FAAN-TASTICA',
    'date' => '22 de noviembre de 2025',
    'location' => 'Estancia Rosario',
    'note' => '* El patrocinio incluye donación en efectivo y cualquier costo directo del evento, incluidos el Bar de Gala (donación de licores), costos de impresión o costos de entretenimiento.',
    'levels' => $levels
];
