<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\AuctionItem;

class AuctionPaloozaController extends Controller
{
    public function index($lang)
    {
        return require dirname(__DIR__, 3) . '/resources/lang/' . $lang . '/auction-palooza.php';
    }

    public function store(Request $request, $lang)
    {
        // ensure item image is present
        $uploadedImagePath = collect(Storage::disk('local')
            ->files('uploads'))
            ->filter(function ($file) use ($request) {
                return str_contains($file, $request->image_id);
            })
            ->first();

        if (!$uploadedImagePath) {
            return response()->json(['status' => 'error', 'message' => 'Uploaded image not found']);
        }

        // Get the uploaded image content
        $uploadedImage = Storage::disk('local')->get($uploadedImagePath);

        // Create the auction item path
        $auctionItemPath = 'auction-items/' . basename($uploadedImagePath);

        // Copy uploaded image to auction item path
        Storage::disk('local')
            ->put($auctionItemPath, $uploadedImage);

        // Delete uploaded image
        Storage::disk('local')
            ->delete($uploadedImagePath);

        // Insert into database
        $rec = $request->validate([
            'donor_name' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'address_2' => 'nullable|string|max:255',
            'item_name' => 'required|string|max:255',
            'item_value' => 'required|numeric',
            'description' => 'required|string|max:1000',
            'terms' => 'nullable|string|max:1000',
        ]);

        $rec['item_image_path'] = $auctionItemPath;

        AuctionItem::create($rec);

        // mc-todo: send email notification and/or add to monday.com

        // Everything done, return ok
        return response()->json(['status' => 'ok']);
    }

    public function uploadItemImage(Request $request)
    {
        if (!isset($_FILES['itemImage'])) {
            logger()->error([
                'error' => 'No item image uploaded',
                'request' => $request->all()
            ]);
            return;
        }

        // Handle the image upload
        $uploadedImage = $_FILES['itemImage'];
        Storage::disk('local')
            ->put('uploads/' . $request->image_id . '.' . pathinfo($uploadedImage['name'], PATHINFO_EXTENSION), file_get_contents($uploadedImage['tmp_name']));
    }
}
