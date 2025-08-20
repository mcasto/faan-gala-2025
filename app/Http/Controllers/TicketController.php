<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Ticket;
use App\Services\MondayService;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function show($lang)
    {
        return require dirname(__DIR__, 3) . '/resources/lang/' . $lang . '/ticket.php';
    }

    public function store($lang, Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'purchaser_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'quantity' => 'required|integer|min:1',
            'payment_method' => 'required|string|max:50',
            'table_number_or_ambassador' => 'nullable|string|max:50',
            'vegetarian_requirement' => 'nullable|string|max:500',
            'note_from_rsvp' => 'nullable|string|max:500',
        ]);

        // Create a new ticket record in the database
        $ticket = \App\Models\Ticket::create($validatedData);

        // Create guests for new ticket
        if ($request->has('guests')) {
            foreach ($request->input('guests') as $guestData) {
                $ticket->guests()->create([
                    'name' => $guestData['name'],
                    'email' => $guestData['email'] ?? null,
                    'phone' => $guestData['phone'] ?? null,
                ]);
            }
        }

        // Build Monday data
        $mondayData = [
            'id' => $ticket->id,
            'created_at' => $ticket->created_at->toDateString(),
            'purchaser_name' => $ticket->purchaser_name,
            'email' => $ticket->email,
            'phone' => $ticket->phone,
            'quantity' => $ticket->quantity,
            'payment_method' => $ticket->payment_method,
            'table_number_or_ambassador' => $ticket->table_number_or_ambassador,
            'vegetarian_requirement' => $ticket->vegetarian_requirement,
            'note_from_rsvp' => $ticket->note_from_rsvp,
            'guests' => Guest::where('ticket_id', $ticket->id)
                ->get()
                ->map(function ($guest) {
                    return $guest->name . " :: " . $guest->email;
                })
                ->implode(', '),
        ];

        $monday = new MondayService();
        $monday->addItem('2025 Gala Tickets', $mondayData);

        return response()->json([
            'status' => 'ok'
        ]);
    }
}
