<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SponsorshipOpportunitiesController extends Controller
{
    public function index($lang)
    {
        return require dirname(__DIR__, 3) . '/resources/lang/' . $lang . '/sponsorship-opportunities.php';
    }
}
