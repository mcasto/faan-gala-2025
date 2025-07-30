<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ItemStatus extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Get the auction items with this status.
     */
    public function auctionItems(): HasMany
    {
        return $this->hasMany(AuctionItem::class, 'status_id');
    }
}
