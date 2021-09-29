<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CallLog extends Model
{
    protected $fillable = [
        'call_from',
		'call_to',
		'duration',
        'time',
        'status',
        'call_sid',
        'recording_sid'
    ];
}
