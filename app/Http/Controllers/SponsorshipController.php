<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SponsorshipController extends Controller
{
    public function show()
    {
        $content = [
            'header' => __('sponsorship-opportunities.header'),
            'date' => __('sponsorship-opportunities.date'),
            'location' => __('sponsorship-opportunities.location'),
            'note' => __('sponsorship-opportunities.note'),
            'levels' => __('sponsorship-opportunities.levels'),
        ];

        return view('sponsorship-opportunities', $content);
    }
}
