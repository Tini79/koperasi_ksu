<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function index()
    {
        return view('/auth.index');
    }

    public function authenticate(LoginRequest $request)
    {
        try {
            $credentials = $request->validated();

            if (Auth::attempt($credentials) && Auth::user()->level->value == 'Admin') {
                $request->session()->regenerate();
                return redirect()->intended(route('dashboard'));
            }

            if (Auth::attempt($credentials) && Auth::user()->level->value == 'Anggota') {
                $request->session()->regenerate();
                return redirect()->intended(route('dashboardanggota'));
            }

            if (Auth::attempt($credentials) && Auth::user()->level->value == 'Ketua') {
                $request->session()->regenerate();
                return redirect()->intended(route('dashboardketua'));
            }
        } catch (Exception $th) {
            return redirect()->route('login')->with('danger', 'Gagal Login!');
        }

        return redirect()->route('login')->with('danger', 'Gagal Login!');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login');
    }
}
