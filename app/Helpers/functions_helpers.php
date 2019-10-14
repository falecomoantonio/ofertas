<?php

if(!function_exists('OneSignalCreate'))
{
    function OneSignalCreate()
    {
        return new \Berkayk\OneSignal\OneSignalClient(
            env('ONESIGNAL_APP_ID'),
            env('ONESIGNAL_API_KEY'),
            env('ONESIGNAL_AUTH_KEY')
        );
    }
}

if(!function_exists('getValue'))
{
    function getValue($key)
    {
        if(\Illuminate\Support\Facades\Cache::has($key)) {
            return \Illuminate\Support\Facades\Cache::get($key);
        } else {
            $obj = keyValue($key);
            if(is_null($obj))
                return null;
            \Illuminate\Support\Facades\Cache::put($key, $obj->value,30);
            return $obj->value;
        }
    }
}

if(!function_exists('getSuperBanner'))
{
    function getSuperBanner()
    {
        $banner = \App\Entities\MetaData::where('key','=','superbanner')->firstOr(function(){
            return null;
        });

        if(is_null($banner))
            return url("assets/images/banner-default.png");
        else
            return url("storage/banner/{$banner->value}");
    }
}

if(!function_exists('keyValue'))
{
    function keyValue($key)
    {
        return \App\Entities\MetaData::find($key);
    }
}

if(!function_exists('getNumberName'))
{
    function getNumberName($key)
    {
        switch ($key)
        {
            case 1: return 'one';
            case 2: return 'two';
            case 3: return 'three';
            case 4: return 'four';
            case 5: return 'five';
        }
    }
}
