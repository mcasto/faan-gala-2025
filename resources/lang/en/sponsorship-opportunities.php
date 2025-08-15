<?php
$levels = [
    'mgm' => [
        'title' => 'MGM Studios',
        'amount' => '$25,000',
        'value' => 25000,
        'benefits' => [
            '2 tables for FAAN-tastic GALA (16 guests)',
            '16 VIP invitations for champagne hour',
            'Full-page sponsorship in the gala program',
            'Named as event sponsor',
            'Name and logo recognition in all event promotions',
            'Recognition by presenter with banner on stage',
            'Recognition in FAAN magazine'
        ]
    ],
    'paramount' => [
        'title' => 'Paramount Pictures',
        'amount' => '$10,000',
        'value' => 10000,
        'benefits' => [
            '2 tables for FAAN-tastic GALA (16 guests)',
            '16 VIP invitations for champagne hour',
            'Half-page advertisement in the gala program',
            'Name and logo recognition in all event promotions as $10,000 Benefactor',
        ]
    ],
    'warner' => [
        'title' => 'Warner Bros',
        'amount' => '$5,000',
        'value' => 5000,
        'benefits' => [
            '1 table for FAAN-tastic GALA (8 guests)',
            '8 VIP invitations for champagne hour',
            'Half-page advertisement in the gala program',
            'Name and logo recognition in all event promotions as $5,000 Benefactor',
        ]
    ],
    'century' => [
        'title' => '20th Century Fox',
        'amount' => '$2,500',
        'value' => 2500,
        'benefits' => [
            '4 tickets for FAAN-tastic GALA',
            '4 VIP invitations for champagne hour',
            'Quarter-page advertisement in the gala program',
            'Name listed in printed materials as $2,500 Benefactor',
        ]
    ],
    'united' => [
        'title' => 'Universal Artists',
        'amount' => '$1,000',
        'value' => 1000,
        'benefits' => [
            '2 tickets for FAAN-tastic GALA',
            '2 VIP invitations for champagne hour',
            'Name listed in printed materials as $1,000 Benefactor',
        ]
    ],
];

usort($levels, function ($a, $b) {
    return $b['value'] < $a['value'] ? 1 : -1;
});

return [
    'header' => 'GALA FAAN-TASTICA',
    'date' => 'November 22, 2025',
    'location' => 'Estancia Rosario',
    'note' => '* Sponsorship includes cash donation and any direct event costs, including Gala Bar (liquor donation), printing costs, or entertainment costs.',
    'levels' => $levels
];
