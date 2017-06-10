<?php

namespace App\Http\Middleware;

use Closure;
// use View;
use RandomArticle;
use Route;
use Redirect;
use Log;

class IdentifyCrawler
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $crawlers = [
            'facebookexternalhit/1.1',
            'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)',
            'Facebot'
        ];

        $userAgent = $request->header('User-Agent');
        Log::error("Hit..!");

        if (str_contains($userAgent, $crawlers)) {
            Log::error("Tracked..!");
            switch (Route::getCurrentRoute()->getName()) {
                case "randomArticle":
                    return Redirect::to('/show');
            }
        }
        return $next($request);
    }
}
