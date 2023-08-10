<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;

class UserController extends Controller
{

    public function __construct()
    {
    }

    public function signIn($role = 1)
    {
        if ($role > 2) {
            throw new Exception("Role doesn't exist");
        }
        return view('user.sign-in')->with('role', $role);
    }
    public function createUser(Request $request, $role = 1)
    {
        $request->validate([
            'name' => 'required|string',
            'firstname' => 'required|string',
            'gender' => 'required|string',
            'email' => 'required|email|unique:user',
            'telephone' => 'required|numeric|unique:user|digits:10',
            'password' => 'required',
        ]);

        $user = new User($request->name, $request->firstname,$request->gender, $request->email, Hash::make($request->password), $request->telephone, $role);
        $user->giveID($role);
        return redirect('/login')->with('role', $role);
    }



    public function login()
    {
        return view('user.login');
    }

    public function logOut(Request $request)
    {
        $request->session()->invalidate();
        return redirect('/login');
    }

    public function doLogin(Request $request)
    {
        $infos = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($infos)) {
            $user = Auth::user(); //? Instance de l'utilisateur authentifié
            \Session::put('user', $user);
            \Session::regenerate();
            if ($user->role_id == 2) {
                return redirect('/list-client');
            } else {
                return redirect('/book-catalog/1');
            }
        } else {
            return redirect('/login')->withErrors([
                "error" => "The login informations are invalid."
            ]);
        }
    }


}
