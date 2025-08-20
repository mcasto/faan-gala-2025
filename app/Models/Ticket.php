<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ticket extends Model
{
    protected $fillable = [
        'purchaser_name',
        'email',
        'phone',
        'quantity',
        'payment_method',
        'table_number_or_ambassador',
        'vegetarian_requirement',
        'note_from_rsvp',
    ];

    public function guests(): HasMany
    {
        return $this->hasMany(Guest::class);
    }
}
