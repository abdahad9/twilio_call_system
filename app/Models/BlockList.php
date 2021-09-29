<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlockList extends Model
{
     protected $fillable = [
            'from',
			'to',
			'by_campaign',
			'by_system'
    ];

}
