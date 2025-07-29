<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JoinUsController extends Controller
{
    public function show()
    {
        $content = [
            'upperRight' => __('join-us.upperRight'),
            'lowerLeft' => __('join-us.lowerLeft'),
        ];

        return view('join-us', $content);
    }
}
