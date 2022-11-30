<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
            return redirect('/home');
        }
        return view('auth.login');
    }

    public function login(loginRequest $request)
    {
        $credentials = $request->getCredentials();
        if (!Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password'], 'active' => 1])) {
            return redirect()->to('/login')->withErrors('Credenciales incorrectas o usuario inactivo!');
        }
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);
        return $this->authenticated($request, $user);
    }

    public function authenticated(Request $request, $user)
    {
        return redirect()->to('/home');
    }
}
