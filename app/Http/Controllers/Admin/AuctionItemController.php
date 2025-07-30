<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuctionItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class AuctionItemController extends Controller
{
    public function create()
    {
        $statuses = \App\Models\ItemStatus::all();
        return view('admin.auction-items.create', compact('statuses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            // Donor Information
            'donor_name' => 'required|string|max:255',
            'individual_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'address_2' => 'nullable|string|max:255',

            // Item Information
            'item_name' => 'required|string|max:255',
            'item_value' => 'nullable|numeric|min:0',
            'description' => 'nullable|string',
            'terms_and_conditions' => 'nullable|string',
            'item_image_path' => 'nullable|image|max:2048', // 2MB Max

            // FAAN Volunteer Information
            'faan_volunteer' => 'nullable|string|max:255',
            'volunteer_email' => 'nullable|email|max:255',

            // Admin Information
            'status_id' => 'nullable|exists:item_statuses,id',
            'admin_notes' => 'nullable|string',
        ]);

        if ($request->hasFile('item_image_path')) {
            $validated['item_image_path'] = $request->file('item_image_path')->store('auction-items', 'public');
        }

        // Combine date and time for timestamp if provided
        if ($request->item_received_date) {
            $timestamp = $request->item_received_date . ' ' . ($request->item_received_time ?? '00:00:00');
            $validated['item_received_timestamp'] = Carbon::parse($timestamp)->toDateTimeString();
        }

        // Set default status if not provided
        if (!isset($validated['status_id'])) {
            $validated['status_id'] = 1; // Assuming 1 is the default status
        }

        AuctionItem::create($validated);

        return redirect()
            ->route('admin.auction-items.index')
            ->with('success', 'Auction item created successfully');
    }

    public function index()
    {
        $items = AuctionItem::with('status')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin.auction-items.index', compact('items'));
    }

    private function formatDateTime($timestamp, $format = 'Y-m-d')
    {
        return $timestamp ? Carbon::parse($timestamp)->format($format) : null;
    }

    public function edit(AuctionItem $item)
    {
        $statuses = \App\Models\ItemStatus::all();
        return view('admin.auction-items.edit', compact('item', 'statuses'));
    }

    public function update(Request $request, AuctionItem $item)
    {
        $validated = $request->validate([
            'status_id' => 'nullable|exists:item_statuses,id',
            'admin_notes' => 'nullable|string',
            'faan_volunteer' => 'nullable|string|max:255',
            'volunteer_email' => 'nullable|email|max:255',
            'item_image_path' => 'nullable|image|max:2048' // 2MB Max
        ]);

        // Handle image upload
        if ($request->hasFile('item_image_path')) {
            // Delete old image if it exists
            if ($item->item_image_path) {
                Storage::disk('public')->delete($item->item_image_path);
            }

            // Store new image
            $validated['item_image_path'] = $request->file('item_image_path')->store('auction-items', 'public');
        }

        // Combine date and time for timestamp if provided
        if ($request->item_received_date) {
            $timestamp = $request->item_received_date . ' ' . ($request->item_received_time ?? '00:00:00');
            $validated['item_received_timestamp'] = \Carbon\Carbon::parse($timestamp)->toDateTimeString();
        }

        $item->update($validated);

        return redirect()
            ->route('admin.auction-items.index')
            ->with('success', 'Item updated successfully');
    }

    public function destroy(AuctionItem $item)
    {
        // Delete the image file if it exists
        if ($item->item_image_path) {
            Storage::disk('public')->delete($item->item_image_path);
        }

        $item->delete();

        return redirect()
            ->route('admin.auction-items.index')
            ->with('success', 'Item deleted successfully');
    }

    public function restore($id)
    {
        AuctionItem::withTrashed()->findOrFail($id)->restore();

        return redirect()
            ->route('admin.auction-items.index')
            ->with('success', 'Item restored successfully');
    }
}
