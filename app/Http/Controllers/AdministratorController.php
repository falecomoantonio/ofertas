<?php

namespace App\Http\Controllers;

use App\Entities\User;
use App\Http\Requests\AdministratorChangePassword;
use App\Http\Requests\AdministratorCreateRequest;
use App\Http\Requests\AdministratorSaveProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $administrators = User::paginate(10);
        return view("dashboard.administrators.index")->with('administrators', $administrators);
    }

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
            Auth::user()->fill([
                "username"=>strtolower($request->get('username')),
                "email"=>strtolower($request->get('email')),
                "name"=>$request->get('name')
            ]);
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

    public function store(AdministratorCreateRequest $request)
    {
        try {
            $user = new User($request->only(["name","username","email"]));
            $user->password = Str::random(64);
            $saved = $user->save();

            if($saved) {
                session()->flash('DASH_MSG_SUCCESS', 'Administrador Registrado');
            } else {
                session()->flash('DASH_MSG_ERROR', 'Não foi possível registrar o Administrador');
            }
            return redirect()->route('administrators.index');
        } catch (\Exception $e) {
            session()->flash('DASH_MSG_WARNING', $e->getMessage());
            return redirect()->route('administrators.index');
        }
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
            $removed = User::destroy(decrypt($id));
            if($removed) {
                session()->flash('DASH_MSG_SUCCESS', 'Administrador Removido');
            } else {
                session()->flash('DASH_MSG_ERROR', 'Não foi possível remover o Administrador');
            }
            return redirect()->route('administrators.index');
        } catch (\Exception $e) {
            session()->flash('DASH_MSG_WARNING', $e->getMessage());
            return redirect()->route('administrators.index');
        }
    }
}
