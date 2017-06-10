<?php

namespace App\Http\Middleware;

use Closure;
// use View;
use RandomArticle;
use Route;
use Redirect;
require_once dirname(__DIR__).'/../../vendor/fzaninotto/faker/src/autoload.php';
use Faker\Factory as Fake;

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

        $faker = Fake::create();


        if (!str_contains($userAgent, $crawlers)) {
            switch (Route::getCurrentRoute()->getName()) {
                case "randomArticle":
                    $data['name'] = $faker->name;
                    $data['description'] = $faker->text;
                    $data['image_url'] = $faker->image;
                    return response(view('article.random')->with('data', $data));
            }
        }
        return $next($request);
    }
}
