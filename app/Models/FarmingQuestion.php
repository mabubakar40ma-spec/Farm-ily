<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FarmingQuestion extends Model
{
    protected $fillable = ['question'];

    public function answers()
    {
        return $this->hasMany(FarmingAnswer::class);
    }
}
