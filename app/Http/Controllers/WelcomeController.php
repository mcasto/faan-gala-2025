<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function show()
    {
        $content = [
            'upperLeft' => __('welcome.upperLeft'),
            'centered' => __('welcome.centered'),
            'lowerLeft' => __('welcome.lowerLeft'),
            'introduction' => __('welcome.introduction'),
            'rightPanel' => __('welcome.rightPanel'),
        ];

        return view('welcome', $content);
    }
}
