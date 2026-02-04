<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Illuminate\Http\Request;

class TrustProxies extends Middleware
{
    /**
     * Trust all proxies (Cloudflare / Coolify / load balancers)
     *
     * @var array<int, string>|string|null
     */
    protected $proxies = '*'; // Trust all proxies

    /**
     * The headers that should be used to detect proxies.
     *
     * @var int
     */
    protected $headers = Request::HEADER_X_FORWARDED_ALL;
}
