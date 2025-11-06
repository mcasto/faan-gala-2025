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

return [
    'upperLeft' => file_get_contents(__DIR__ . '/html-blocks/welcome/upper-left.html'),
    'centered' => file_get_contents(__DIR__ . '/html-blocks/welcome/centered.html'),
    'lowerLeft' => file_get_contents(__DIR__ . '/html-blocks/welcome/lower-left.html'),
    'introduction' => file_get_contents(__DIR__ . '/html-blocks/welcome/introduction.html'),
    'rightPanel' => file_get_contents(__DIR__ . '/html-blocks/welcome/right-panel.html'),
    'galaImages' => json_decode(file_get_contents(__DIR__ . '/gala-2023-gallery.json'), true),
    'globalLoveStory' => file_get_contents(__DIR__ . '/html-blocks/welcome/global-love-story.html'),
    'ungala' => file_get_contents(__DIR__ . '/html-blocks/welcome/ungala.html'),
    'visionary' => file_get_contents(__DIR__ . '/html-blocks/welcome/visionary.html'),
    'clapboards' => clapboards(),
    'video' => 'storage/videos/superdogs.mp4'
];
