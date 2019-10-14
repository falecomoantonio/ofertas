<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
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


    public function verifyIfMaintenanceMode(Application $app){
        $flag = $app->isDownForMaintenance();
        return response()->json(['status'=>$flag]);
    }

    public function enableMaintenanceMode()
    {
        try {
            if(Auth::check())
                throw new \Exception('Você não tem permissão para realizar essa ação');
            Artisan::call('down');
            return response()->json(['status'=>true]);
        } catch (\Exception $e) {
            return response()->json(['status'=>false,'message'=>$e->getMessage()]);
        }
    }

    public function disableMaintenanceMode(Request $request)
    {
        try {
            if(Auth::check())
                throw new \Exception('Você não tem permissão para realizar essa ação');
            Artisan::call('up');
            return response()->json(['status'=>true]);
        } catch (\Exception $e) {
            return response()->json(['status'=>false,'message'=>$e->getMessage()]);
        }
    }

    public function cacheClear()
    {
        try {
            Artisan::call('optimize');
            return response()->json(['status'=>true]);
        } catch (\Exception $e) {
            return response()->json(['status'=>false,'message'=>$e->getMessage()]);
        }
    }

    //
}
