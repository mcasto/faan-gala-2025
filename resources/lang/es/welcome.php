<?php
return [
    'upperLeft' => file_get_contents(__DIR__ . '/html-blocks/welcome/upper-left.html'),
    'centered' => file_get_contents(__DIR__ . '/html-blocks/welcome/centered.html'),
    'lowerLeft' => file_get_contents(__DIR__ . '/html-blocks/welcome/lower-left.html'),
    'introduction' => file_get_contents(__DIR__ . '/html-blocks/welcome/introduction.html'),
    'rightPanel' => file_get_contents(__DIR__ . '/html-blocks/welcome/right-panel.html'),
    'galaImages' => json_decode(file_get_contents(__DIR__ . '/gala-2023-gallery.json'), true),
];
