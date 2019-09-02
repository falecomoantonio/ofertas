<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shivella\Bitly\Facade\Bitly;

class ApiController extends Controller
{
    public function getUrl(Request $request)
    {
        if($request->has('url'))
        {
            $url = Bitly::getUrl($request->url);
            return response()->json(["url"=>$url]);
        }
        return response()->json(["url"=>null]);
    }
    //
}
