<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JoinUsController extends Controller
{
    public function show()
    {
        $content = [
            'upperRight' => __('join-us.upperRight'),
            'rightPanel' => __('join-us.rightPanel'),
        ];

        return view('join-us', $content);
    }
}
