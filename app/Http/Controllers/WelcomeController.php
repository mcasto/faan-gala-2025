<?php

namespace App\Http\Controllers;

class WelcomeController extends Controller
{
    public function index($lang)
    {
        return require dirname(__DIR__, 3) . '/resources/lang/' . $lang . '/welcome.php';
    }
}
