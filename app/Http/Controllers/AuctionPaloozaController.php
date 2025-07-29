<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuctionPaloozaController extends Controller
{
    public function show()
    {
        $content = [
            'leftPanel' => __('auction-palooza.leftPanel'),
            'rightPanel' => __('auction-palooza.rightPanel'),
        ];

        return view('auction-palooza', $content);
    }
}
