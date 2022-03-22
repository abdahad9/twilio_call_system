<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $casts = [
        'created_at' => 'datetime:M d, h:i a',
    ];
}
