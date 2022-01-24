<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class TwilioPhoneNumbers extends Model
{
      protected $fillable = [
        'phoneNumber',
		'friendlyName',
		'sid'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
