<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AuctionItem extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'donor_name',
        'individual_name',
        'email',
        'phone',
        'address',
        'address_2',
        'item_name',
        'item_value',
        'item_image_path',
        'description',
        'terms_and_conditions',
        'faan_volunteer',
        'volunteer_email',
        'item_received_date',
        'item_received_time',
        'status_id',
        'admin_notes',
    ];

    protected $casts = [
        'item_value' => 'decimal:2',
        'item_received_date' => 'date',
        'item_received_time' => 'datetime',
    ];

    /**
     * Get the status of this auction item.
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(ItemStatus::class, 'status_id');
    }
}
