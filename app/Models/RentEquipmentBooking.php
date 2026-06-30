<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class RentEquipmentBooking extends Model
{
    //
    public function equipment()
    {
        return $this->belongsTo(RentEquipment::class, 'equipment_id');
    }
}