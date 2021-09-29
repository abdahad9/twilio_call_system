<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CallNote extends Model
{
     protected $fillable = [
        'sid',
		'call_id',
		'phone_number',
		'note'
    ];

}
