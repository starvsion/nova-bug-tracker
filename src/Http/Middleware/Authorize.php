<?php

namespace Starvsion\NovaBugTracker\Http\Middleware;

use Starvsion\NovaBugTracker\NovaBugTracker;

class Authorize
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response
     */
    public function handle($request, $next)
    {
        return resolve(NovaBugTracker::class)->authorize($request) ? $next($request) : abort(403);
    }
}
