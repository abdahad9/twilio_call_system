<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TwilioPhoneNumbers extends Model
{
      protected $fillable = [
        'phoneNumber',
		'friendlyName',
		'sid'
    ];
}
