<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function index() {
        return view('pages.user.index' , [
            'user' => Auth::user()
        ]);
    }

    function edit() {
        return view('pages.user.edit');
    }

    function update(Request $request, User $user) {
        try {
            $validatedData = $request->validate([
                'old-pw' => 'required',
                'new-pw' => 'required',
                'confirm-pw' => 'required',
            ]);

            if($validatedData) {
                if(Hash::check($validatedData['old-pw'],Auth::user()->password)) {
                    if(strcmp($validatedData['new-pw'], $validatedData['confirm-pw']) === 0){
                        $new_pw = $validatedData['new-pw'];
                        $user->update([
                            'password'=> $new_pw
                        ]);
                        return redirect()->route('profile')->with('success' , 'Password berhasil diubah!');
                        exit;
                    }
                }
            }

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
