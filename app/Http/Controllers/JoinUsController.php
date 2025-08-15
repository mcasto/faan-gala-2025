<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JoinUsController extends Controller
{
    public function index($lang)
    {
        return require dirname(__DIR__, 3) . '/resources/lang/' . $lang . '/join-us.php';
    }
}
