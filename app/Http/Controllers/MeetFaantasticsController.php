<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeetFaantasticsController extends Controller
{
    public function show()
    {
        $content = [
            'header' => __('meet-faantastics.header'),
            'boardSection' => __('meet-faantastics.boardSection'),
            'teamSection' => __('meet-faantastics.teamSection'),
            'committeeSection' => __('meet-faantastics.committeeSection'),
        ];

        return view('meet-faantastics', $content);
    }
}
