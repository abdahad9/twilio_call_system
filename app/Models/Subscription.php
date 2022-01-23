<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $casts = [
        'created_at' => 'datetime:M d, h:i a',
        'next_date' => 'date:Y-m-d',
        'starting_date' => 'date:Y-m-d',
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
