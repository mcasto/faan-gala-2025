<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AuctionItem extends Model
{
    protected $fillable = [
        'donor_name',
        'contact_name',
        'email',
        'phone',
        'address',
        'address_2',
        'item_name',
        'item_value',
        'description',
        'item_image_path',
    ];

    public function itemStatus(): HasOne
    {
        return $this->hasOne(ItemStatus::class);
    }
}
