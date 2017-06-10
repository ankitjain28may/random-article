<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
require_once dirname(__DIR__).'/../../vendor/fzaninotto/faker/src/autoload.php';
use Faker\Factory as Fake;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function show()
    {
        $faker = Fake::create();

        $data['name'] = $faker->name;
        $data['description'] = $faker->text;
        $data['image_url'] = $faker->image;
        return view('article.random')->with('data', $data);
    }
}
