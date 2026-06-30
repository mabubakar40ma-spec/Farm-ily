<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FarmingAnswer extends Model
{
    protected $fillable = ['farming_question_id', 'answer'];

    public function question()
    {
        return $this->belongsTo(FarmingQuestion::class);
    }
}
