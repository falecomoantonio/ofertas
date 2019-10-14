<?php

namespace App\Http\Controllers;

use App\Entities\CategoryBlog;
use App\Entities\CategoryOffer;
use App\Entities\Offer;
use App\Entities\Publication;
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
        // BA82Y@4Faa
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showOffers()
    {
        return view('blog.onepage')
                        ->with('offers', Offer::paginate(24))
                        ->with('categories', CategoryOffer::all());
    }


    public function blog()
    {
        return view('blog.posts')
                    ->with('collection', Publication::paginate(24))
                    ->with('categories', CategoryBlog::all());
    }
}
