<?php

namespace App\Http\Controllers;

use App\Models\Access;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {        
        return view('auth.login');
    }

    public function auth(AuthRequest $request)
    {
        if (auth()->attempt([
            'usr_usuari' => $request->username,
            'password' => $request->password,
        ])) {			
            $user = auth()->user();			
            session()->put('menus', Access::getUserAccess($user->usr_codigo));

            return redirect()->route('dashboard');
        }		
		
        return back()		    
            ->withDanger('Usuario y Contraseña Invalido.')
            ->withInfo('Revise las mayúsculas.');
    }

    public function logout(Request $request)
    {
        session()->flush();

        Auth::logout();

        return redirect()->route('dashboard');
    }
}
