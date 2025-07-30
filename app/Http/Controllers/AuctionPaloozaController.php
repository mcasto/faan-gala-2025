<?php

namespace App\Http\Controllers;

use App\Models\AuctionItem;
use App\Models\ItemStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuctionPaloozaController extends Controller
{
    public function show()
    {
        $content = [
            'leftPanel' => __('auction-palooza.leftPanel'),
            'rightPanel' => __('auction-palooza.rightPanel'),
            'bottomPanel' => __('auction-palooza.bottomPanel'),
            'form' => __('auction-palooza.form'),
        ];

        return view('auction-palooza', $content);
    }

    public function store(Request $request)
    {
        // Validate and process the auction item submission
        $validatedData = $request->validate([
            // Donor Information
            'donor_name' => 'required|string|max:255',
            'individual_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => ['required', 'string', 'regex:/^[0-9]{3}-?[0-9]{3}-?[0-9]{4}$/'],
            'address' => 'required|string|max:255',
            'address_2' => 'nullable|string|max:255',

            // Item Information
            'item_name' => 'required|string|max:255',
            'item_value' => 'nullable|numeric|min:0',
            'item_image' => 'nullable|image|max:4096', // 4MB max
            'description' => 'required|string',
            'terms' => 'nullable|string',

            // Admin
            'status_id' => 'nullable|exists:item_statuses,id',
            'admin_notes' => 'nullable|string',
        ]);

        // Handle file upload if an image was provided
        if ($request->hasFile('item_image')) {
            $path = $request->file('item_image')->storeAs(
                'images/auction-items',  // This path is relative to storage/app/public
                $request->file('item_image')->hashName(),
                'public'  // Specify the public disk
            );
            $validatedData['item_image_path'] = "storage/$path";
        }

        // Get the initial status (presumably 'pending')
        $pendingStatus = \App\Models\ItemStatus::where('name', 'pending')->first();

        try {
            // Create the auction item
            $auctionItem = AuctionItem::create([
                // Donor Information
                'donor_name' => $validatedData['donor_name'],
                'individual_name' => $validatedData['individual_name'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
                'address' => $validatedData['address'],
                'address_2' => $validatedData['address_2'],

                // Item Information
                'item_name' => $validatedData['item_name'],
                'item_value' => $validatedData['item_value'],
                'item_image_path' => $validatedData['item_image_path'] ?? null,
                'description' => $validatedData['description'],
                'terms_and_conditions' => $validatedData['terms'],

                // Status
                'status_id' => $pendingStatus->id,
            ]);

            return redirect()
                ->route('auction-palooza')
                ->with('success', __('auction-palooza.item_submitted'));
        } catch (\Exception $e) {

            // If there was an uploaded file, remove it
            if (isset($validatedData['item_image_path'])) {
                Storage::disk('public')->delete($validatedData['item_image_path']);
            }

            return redirect()
                ->back()
                ->withInput()
                ->with('error', __('auction-palooza.submission_error'));
        }
    }
}
