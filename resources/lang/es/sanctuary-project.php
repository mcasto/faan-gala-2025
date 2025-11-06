<?php

return [
    'meta' => [
        'title' => 'Proyecto Santuario FAAN-Ecuador',
        'description' => 'Proyecto Santuario FAAN-Ecuador',
        'keywords' => 'proyecto de santuario de animales,Proyecto de santuario de animale,Ecuador,Rescate y Adopción de Animales',
        'ogTitle' => 'Proyecto Santuario FAAN-Ecuador',
        'ogDescription' => 'Proyecto Santuario FAAN-Ecuador',
        'ogLocale' => 'es_US'
    ],
    'header' => "Proyecto y objetivos del Santuario actual de FAAN",
    'subtitle' => 'Manteniendo a los animales seguros en Cuenca, Ecuador',
    'overview' => file_get_contents(__DIR__ . '/html-blocks/sanctuary-project/overview.html'),
    'community' => file_get_contents(__DIR__ . '/html-blocks/sanctuary-project/community.html'),
    'budget' => [
        'header' => file_get_contents(__DIR__ . '/html-blocks/sanctuary-project/budget.html'),
        'items' => json_decode(file_get_contents(__DIR__ . '/html-blocks/sanctuary-project/budget.json'))
    ],
    'video' => '/storage/videos/superdogs.mp4',
    'image' => '/storage/images/superdogs-logo-es.png'
];
