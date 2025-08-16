<?php
$levels = [
    'mgm' => [
        'title' => 'MGM Studios',
        'amount' => '$25,000',
        'value' => 25000,
        'benefits' => [
            '2 mesas para el GALA FAAN-TÁSTICO (16 invitados)',
            '16 invitaciones VIP para la hora del champán',
            'Página completa de patrocinio en el programa del gala',
            'Mencionado como patrocinador del evento',
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
            '2 mesas para el GALA FAAN-TÁSTICO (16 invitados)',
            '16 invitaciones VIP para la hora del champán',
            'Media página de publicidad en el programa del gala',
            'Reconocimiento de nombre y logo en todas las promociones del evento como Benefactor de $10,000',
        ]
    ],
    'warner' => [
        'title' => 'Warner Bros',
        'amount' => '$5,000',
        'value' => 5000,
        'benefits' => [
            '1 mesa para el GALA FAAN-TÁSTICO (8 invitados)',
            '8 invitaciones VIP para la hora del champán',
            'Media página de publicidad en el programa del gala',
            'Reconocimiento de nombre y logo en todas las promociones del evento como Benefactor de $5,000',
        ]
    ],
    'century' => [
        'title' => '20th Century Fox',
        'amount' => '$2,500',
        'value' => 2500,
        'benefits' => [
            '4 entradas para el GALA FAAN-TÁSTICO',
            '4 invitaciones VIP para la hora del champán',
            'Cuarto de página de publicidad en el programa del gala',
            'Nombre listado en materiales impresos como Benefactor de $2,500',
        ]
    ],
    'united' => [
        'title' => 'Universal Artists',
        'amount' => '$1,000',
        'value' => 1000,
        'benefits' => [
            '2 entradas para el GALA FAAN-TÁSTICO',
            '2 invitaciones VIP para la hora del champán',
            'Nombre listado en materiales impresos como Benefactor de $1,000',
        ]
    ],
];

usort($levels, function ($a, $b) {
    return $b['value'] < $a['value'] ? 1 : -1;
});

return [
    'header' => 'GALA FAAN-TÁSTICA',
    'date' => '22 de noviembre de 2025',
    'location' => 'Estancia Rosario',
    'note' => '* El patrocinio incluye donación en efectivo y cualquier costo directo del evento, incluyendo Bar del Gala (donación de licor), costos de impresión o costos de entretenimiento.',
    'levels' => $levels
];
