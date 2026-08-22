<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Profile;
use App\Models\User;


class ProfileController extends Controller
{
    public function GetProfile()
    {
        $currentUser = Auth::user();

        $user = User::find($currentUser->id);


        if ($currentUser->profile) {

            $profile = Profile::where('user_id', $user->id)->first();
            return view('profile.update', ['profile' => $profile]);

        } else {

            return view('profile.add');
        }

    }

    public function store(Request $request)
    {
        $request->validate([
            'age' => ['required', 'numeric', 'min:10'],
            'bio' => ['required'],
        ], [
            "required" => "Inputan :attribute wajib diisi",
            "min" => "Inputan :attribute minimal :min"
        ]);

        // Insert data baru
        $profile = new Profile;
        $profile->age = $request->input('age');
        $profile->bio = $request->input('bio');



        $profile->user_id = Auth::id();

        $profile->save();

        return redirect('/profile')->with('success', 'Profile berhasil dibuat!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'age' => ['required', 'numeric', 'min:10'],
            'bio' => ['required'],
        ], [
            "required" => "Inputan :attribute wajib diisi",
            "min" => "Inputan :attribute minimal :min"
        ]);

        $currentUser = Auth::user();
        $profile = Profile::where('user_id', $currentUser->id)->first();
        $profile->age = $request->input('age');
        $profile->bio = $request->input('bio');
        $profile->user_id = Auth::id();




        $profile->save();

        return redirect('/profile')->with('success', 'Profile berhasil diupdate!');
    }

}
