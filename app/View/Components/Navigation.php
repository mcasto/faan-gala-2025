<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navigation extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $links = [
            ['name' => 'home', 'title' => 'Home', 'url' => '#'],
            ['name' => 'sponsorship-opportunities', 'title' => 'Sponsorship Opportunities', 'url' => '#'],
            ['name' => 'join-us', 'title' => 'Join Us', 'url' => '#'],
            ['name' => 'auction-palooza', 'title' => 'Auction Palooza', 'url' => '#'],
        ];

        return view('components.navigation', compact('links'));
    }
}
