<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdministratorChangePassword;
use App\Http\Requests\AdministratorSaveProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.administrators.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.administrators.create");
    }

    public function myProfile()
    {
        return view("dashboard.administrators.profile")->with('user', Auth::user());
    }

    public function saveProfile(AdministratorSaveProfileRequest $request)
    {
        try {
            Auth::user()->fill($request->all());
            $saved = Auth::user()->save();
            if($saved) {
                session()->flash('DASH_MSG_SUCCESS', 'Perfil Atualizado');
            } else {
                session()->flash('DASH_MSG_ERROR', 'Não foi possível atualizar o Perfil');
            }
            return redirect()->route('administrators.profile');
        } catch (\Exception $e) {
            session()->flash('DASH_MSG_WARNING', $e->getMessage());
            return redirect()->route('administrators.profile');
        }
    }

    public function changePassword(AdministratorChangePassword $request)
    {
        try {
            Auth::user()->fill([ 'password' => Hash::make($request->get('password'))]);
            $saved = Auth::user()->save();
            if($saved) {
                session()->flash('DASH_MSG_SUCCESS', 'Senha Atualizada');
            } else {
                session()->flash('DASH_MSG_ERROR', 'Não foi possível atualizar a Senha');
            }
            return redirect()->route('administrators.profile');
        } catch (\Exception $e) {
            session()->flash('DASH_MSG_WARNING', $e->getMessage());
            return redirect()->route('administrators.profile');
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

        } catch (\Exception $e) {

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

        } catch (\Exception $e) {

        }
    }
}
