<?php

namespace App\Http\Controllers;

class UngalaTicketscontroller extends Controller
{
    public function index($lang)
    {
        return require dirname(__DIR__, 3) . '/resources/lang/' . $lang . '/ungala-tickets.php';
    }
}
