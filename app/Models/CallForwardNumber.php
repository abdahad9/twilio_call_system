<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class CallForwardNumber extends Model
{
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
