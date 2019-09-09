<?php

namespace App\Http\Controllers;

use App\Entities\Category;
use App\Entities\CategoryOffer;
use App\Entities\Offer;
use Berkayk\OneSignal\OneSignalClient;
use Berkayk\OneSignal\OneSignalFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Shivella\Bitly\Facade\Bitly;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::orderBy('title')->paginate(env('PAGINATE'));
        return view('dashboard.offers.index')->with('offers', $offers);
    }

    public function index2alter()
    {
        $offers = Offer::orderBy('id')->paginate(env('PAGINATE') * 10);
        return view('dashboard.offers.index2alter')->with('offers', $offers);
    }

    public function show($id = null)
    {
        $offers = Offer::orderBy('id')->paginate(env('PAGINATE') * 10);
        return view('dashboard.offers.index2alter')->with('offers', $offers);
    }

    public function create()
    {
        try {
            $categories = CategoryOffer::all();
            if($categories->count()==0)
                throw new \Exception("Nenhuma categoria registrada");

            return view('dashboard.offers.create')->with('categories', $categories);
        } catch (\Exception $e) {
            session()->flash('DASH_MSG_WARNING', $e->getMessage());
            return redirect()->route('offers.index');
        }
    }


    public function store(Request $request)
    {
        try {
            $offer = new Offer($request->except(["_token","gallery","banner"]));
            $offer->owner_id = Auth::id();
            $offer->link = $request->link;
            $offer->link_bitly = Bitly::getUrl($request->link);

            if($request->hasFile('banner')) {
                $newNameHash = md5(Carbon::now());
                $newName = sprintf("%s.%s", $newNameHash, $request->banner->getClientOriginalExtension());
                $upload = $request->banner->storeAs('public/offers', $newName);
                if($upload) {
                    $offer->banner = $newName;
                } else {
                    $offer->banner = 'banner-default.png';
                }
            } else {
                $offer->banner = 'banner-default.png';
            }

            if($request->hasfile('gallery'))
            {
                $gallery = array();
                foreach($request->file('gallery') as $image)
                {
                    $newNameHash = Str::random(32);
                    $newName = sprintf("%s.%s", $newNameHash, $image->getClientOriginalExtension());
                    $image->storeAs('public/gallery', $newName);
                    $gallery[] = $newName;
                }

                $offer->gallery = $gallery;
            } else {
                $offer->gallery = array();
            }
            $saved = $offer->save();
            if ($saved) {
                session()->flash('DASH_MSG_SUCCESS', 'Oferta Registrada');
            } else {
                session()->flash('DASH_MSG_ERROR', 'Não foi possível registrar a Oferta');
            }
            return redirect()->route('offers.index');
        } catch (\Exception $e) {
            session()->flash('DASH_MSG_WARNING', $e->getMessage());
            return redirect()->route('offers.index');
        }
    }

    public function edit($id)
    {
        try {
            $offer = Offer::find(decrypt($id));
            if(is_null($offer))
                throw new \Exception("Oferta Não Encontrada");

            return view('dashboard.offers.edit')
                        ->with('offer', $offer)
                        ->with('categories', CategoryOffer::all());
        } catch (\Exception $e) {
            session()->flash('DASH_MSG_WARNING', $e->getMessage());
            return redirect()->route('offers.index');
        }
    }

    public function updatePrice(Request $request)
    {
        try {

            $offer = Offer::find(decrypt($request->offer));

            $oldPrice = $offer->price;
            $offer->price = $request->price;
            $offer->promo = ($request->price < $oldPrice);

            $saved = $offer->save();
            if($saved) {
                return response()->json(['status'=>true,'message'=>'Preço Atualizado']);
            } else {
                return response()->json(['status'=>false,'message'=>'Não foi possível atualizar o preço']);
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
            return response()->json(['status'=>false,'message'=>$e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $offer = Offer::find(decrypt($id));
            if(is_null($offer))
                throw new \Exception('Oferta Não Encontrada');

            $notify = $offer->price > $request->price;
            $oldPrice = $offer->price;
            $newPrice = $request->price;

            $offer->fill($request->all());
            $saved = $offer->save();

            if ($saved) {
                if($notify) {
                    $message = sprintf("Oferta exclusiva, o {$offer->title} baixou o preço, antes custava R$ {$oldPrice} e agora está por R$ {$newPrice}.");
                    $onesignal = OneSignalCreate();
                    $onesignal->sendNotificationToAll($message,$url = $offer->link,$data = null,$buttons = null,$schedule = null);
                }
                session()->flash('DASH_MSG_SUCCESS', 'Oferta Atualizada');
            } else {
                session()->flash('DASH_MSG_ERROR', 'Não foi possível atualizar a Oferta');
            }
            return redirect()->route('offers.index');
        } catch (\Exception $e) {
            session()->flash('DASH_MSG_WARNING', $e->getMessage());
            return redirect()->route('offers.index');
        }
    }

    public function destroy($id)
    {
        try {
            $removed = Offer::destroy(decrypt($id));
            if($removed) {
                session()->flash('DASH_MSG_SUCCESS', 'Oferta Removida');
            } else {
                session()->flash('DASH_MSG_ERROR', 'Não foi possível remover a Oferta');
            }
            return redirect()->route('offers.index');
        } catch (\Exception $e) {
            session()->flash('DASH_MSG_WARNING', $e->getMessage());
            return redirect()->route('offers.index');
        }
    }
}
