<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RentEquipment extends Model
{
    //

    function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
    function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function bookings()
    {
        return $this->hasMany(RentEquipmentBooking::class, 'equipment_id');
    }
}