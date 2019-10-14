<?php

namespace App\Http\Controllers;

use App\Entities\MetaData;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class SettingsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view("dashboard.settings.index");
    }

    public function changeKeyValue(Request $request)
    {
        try {
            Cache::forget($request->get('key'));
            $meta = MetaData::find($request->get('key'));
            if(is_null($meta)) {
                $meta = new MetaData();
                $meta->fill(['key'=>$request->get('key'), 'value'=>$request->get('value')]);
            } else {
                $meta->value = $request->get('value');
            }
            $saved = $meta->save();
            if ($saved) {
                session()->flash('DASH_MSG_SUCCESS', 'Chave Registrada/Atualizada');
            } else {
                session()->flash('DASH_MSG_ERROR', 'Não foi Registrar/Atualizar a chave');
            }
            return redirect()->route('settings.index');
        } catch (\Exception $e) {
            session()->flash('DASH_MSG_WARNING', $e->getMessage());
            return redirect()->route('settings.index');
        }
    }

    public function frm1KeyValue(Request $request) {
        try {
            $seoName = keyValue('seo_name');
            if(is_null($seoName)) {
                $seoName = new MetaData(['key'=>'seo_name','value'=>null]);
            }

            $seoName->value = $request->get('seo_name');
            $seoName->save();


            $seoDescription = keyValue('seo_description');
            if(is_null($seoDescription)) {
                $seoDescription = new MetaData(['key'=>'seo_description','value'=>null]);
            }
            $seoDescription->value = $request->get('seo_description');
            $seoDescription->save();

            $seoImage = keyValue('seo_imagem');
            if(is_null($seoImage)) {
                $seoImage = new MetaData(['key'=>'seo_imagem','value'=>null]);
            }


            if($request->has('seo_imagem') && $request->file('seo_imagem')->isValid()) {

                $newNameHash = md5(Carbon::now());
                $newName = sprintf("%s.%s", $newNameHash, $request->seo_imagem->getClientOriginalExtension());
                $upload = $request->seo_imagem->storeAs('public/banner', $newName);
                if ($upload) {
                    $seoImage->value = $newName;
                } else {
                    $seoImage->value = 'seo-default.png';
                }

                $seoImage->save();
            }


            Cache::forget('seo_description');
            Cache::forget('seo_name');
            Cache::forget('seo_imagem');

            session()->flash('DASH_MSG_SUCCESS', 'Dados de SEO Registrado');
            return redirect()->route('settings.index');
        } catch (\Exception $e) {
            session()->flash('DASH_MSG_WARNING', $e->getMessage());
            return redirect()->route('settings.index');
        }
    }

    public function frm2KeyValue(Request $request) {
        try {
            $seoName = keyValue('og_site_name');
            if(is_null($seoName)) {
                $seoName = new MetaData(['key'=>'og_site_name','value'=>null]);
            }
            $seoName->value = $request->get('og_site_name');
            $seoName->save();


            $seoTitle = keyValue('og_title');
            if(is_null($seoTitle)) {
                $seoTitle = new MetaData(['key'=>'og_title','value'=>null]);
            }
            $seoTitle->value = $request->get('og_title');
            $seoTitle->save();

            $seoDescription = keyValue('og_description');
            if(is_null($seoDescription)) {
                $seoDescription = new MetaData(['key'=>'og_description','value'=>null]);
            }
            $seoDescription->value = $request->get('og_description');
            $seoDescription->save();

            $seoTags = keyValue("article_tag");
            if(is_null($seoTags)) {
                $seoTags = new MetaData(['key'=>'article_tag','value'=>null]);
            }
            $seoTags->value = $request->get('article_tag');
            $seoTags->save();

            $seoImage = keyValue('og_image');
            if(is_null($seoImage)) {
                $seoImage = new MetaData(['key'=>'og_image','value'=>null]);
            }


            if($request->has('seo_imagem') && $request->file('seo_imagem')->isValid()) {

                $newNameHash = md5(Carbon::now());
                $newName = sprintf("%s.%s", $newNameHash, $request->seo_imagem->getClientOriginalExtension());
                $upload = $request->seo_imagem->storeAs('public/banner', $newName);
                if ($upload) {
                    $seoImage->value = $newName;
                } else {
                    $seoImage->value = 'seo-default.png';
                }

                $seoImage->save();
            }

            Cache::forget('og_title');
            Cache::forget('og_title');
            Cache::forget('og_site_name');
            Cache::forget('og_image');
            Cache::forget('article_tag');

            session()->flash('DASH_MSG_SUCCESS', 'Dados de SEO Registrado');
            return redirect()->route('settings.index');
        } catch (\Exception $e) {
            session()->flash('DASH_MSG_WARNING', $e->getMessage());
            return redirect()->route('settings.index');
        }
    }

    public function changeBannerApplication(Request $request)
    {
        try {
            $meta = keyValue('superbanner');
            $newNameHash = md5(Carbon::now());
            $newName = sprintf("%s.%s", $newNameHash, $request->banner->getClientOriginalExtension());
            $upload = $request->banner->storeAs('public/banner', $newName);
            if($upload) {
                $meta->value = $newName;
            } else {
                $meta->value = 'default.png';
            }

            $saved = $meta->save();
            if ($saved) {
                session()->flash('DASH_MSG_SUCCESS', 'Banner registrado');
            } else {
                session()->flash('DASH_MSG_ERROR', 'Não foi possível trocar o banner');
            }
            return redirect()->route('settings.index');
        } catch (\Exception $e) {
            session()->flash('DASH_MSG_WARNING', $e->getMessage());
            return redirect()->route('settings.index');
        }
    }
}
