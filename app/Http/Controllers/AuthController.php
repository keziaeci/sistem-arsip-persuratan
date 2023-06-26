<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class AuthController extends Controller
{
    function index() {
        return view('pages.login.index');
    }

    function dashboard() {
        $jumlah_sm = Surat::where('category_id', 1)->count();
        $jumlah_sk = Surat::where('category_id', 2)->count();

        $sm = Surat::select(DB::raw("COUNT(*) as count"),DB::raw("MONTHNAME(tanggal) as m"))
        ->whereYear('tanggal', date('Y'))
        ->where('category_id', 1)
        ->groupBy(DB::raw('m'))
        ->orderBy(DB::raw('MONTH(tanggal)'),'ASC')
        ->pluck('count', 'm');
        
        $sk = Surat::select(DB::raw("COUNT(*) as count"),DB::raw("MONTHNAME(tanggal) as m"))
        ->whereYear('tanggal', date('Y'))
        ->where('category_id', 2)
        ->groupBy(DB::raw('m'))
        ->orderBy(DB::raw('MONTH(tanggal)'),'ASC')
        ->pluck('count', 'm');

        // dd(compact('sm', 'sk'));

        return view('pages.dashboard', [
            'surat_masuk' => $jumlah_sm,
            'surat_keluar' => $jumlah_sk,
        ], compact('sm', 'sk'));
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
