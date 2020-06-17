<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UsersController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('user/show', ['user' => $user]);
    }

    public function edit(){
        $user = Auth::user();
        return view('user/edit', ['user' => $user]);
    }

    public function update(Request $request){
        $user = Auth::user();
        $user->name = $request->user_name;

        if ($request->user_profile_photo != null) {
            $request->user_profile_photo->storeAs('public/user_images', $user->id . '.jpg');
            $user->profile_photo = $user->id . '.jpg';
        }

        if ($request->gym_address != null) {
            $user->gym_address= $request->gym_address;
        }
        if ($request->gym_name != null) {
            $user->gym_name= $request->gym_name;
        }
        $user->password = bcrypt($request->user_password);
        $user->save();

        return redirect('/users/' . $user->id);
    }
}
