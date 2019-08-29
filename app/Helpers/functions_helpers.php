<?php

if(!function_exists('getSuperBanner'))
{
    function getSuperBanner()
    {
        return \App\Entities\MetaData::where('key','=','superbanner')->firstOr(function(){
            return null;
        });
    }
}

if(!function_exists('keyValue'))
{
    function keyValue($key)
    {
        return \App\Entities\MetaData::where('key','=',$key)->firstOr(function(){
            return null;
        });
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
