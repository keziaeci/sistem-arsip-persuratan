<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function index() {
        return view('pages.login.index');
    }

    function dashboard() {
        $jumlah_sm = Surat::where('category_id', 1)->count();
        $jumlah_sk = Surat::where('category_id', 2)->count();
        return view('pages.dashboard', [
            'surat_masuk' => $jumlah_sm,
            'surat_keluar' => $jumlah_sk,
        ]);
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/dashboard');
        }

        return back()->with('failed', 'Username atau password salah!');
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

}
