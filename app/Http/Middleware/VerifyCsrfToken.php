<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
         '/support/call',
         '/incomming',
         '/logs',
         '/forwarding/call-status',
         '/forwarding/incomming',
         '/forwarding/forward-call',
         '/forwarding/forward-status',
         '/forwarding/recording',
         '/webhook'
    ];
}
