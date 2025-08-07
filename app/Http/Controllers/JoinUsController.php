<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JoinUsController extends Controller
{
    public function show()
    {
        $content = [
            'rightPanelTop' => __('join-us.rightPanelTop'),
            'rightPanelDonate' => __('join-us.rightPanelDonate'),
            'rightPanelBottom' => __('join-us.rightPanelBottom'),
        ];

        return view('join-us', $content);
    }
}
