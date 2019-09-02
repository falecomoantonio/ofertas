<?php

namespace App\Http\Controllers;

use App\Entities\CategoryBlog;
use App\Entities\CategoryOffer;
use App\Entities\Offer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showOffers()
    {
        return view('blog.onepage')
                        ->with('offers', Offer::all())
                        ->with('categories', CategoryOffer::all());
    }
}
