<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CallForwardLog extends Model
{

    protected $casts = [
        'created_at' => 'datetime:M d, h:i a',
    ];

    public function call_forward_number()
    {
        return $this->hasOne(CallForwardNumber::class,'phoneNumber', 'twilio_number');
    }
}
