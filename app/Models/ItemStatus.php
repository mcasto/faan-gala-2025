<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\AuctionItem;

class ItemStatus extends Model
{
    public function auction_item(): BelongsTo
    {
        return $this->belongsTo(AuctionItem::class);
    }
}
