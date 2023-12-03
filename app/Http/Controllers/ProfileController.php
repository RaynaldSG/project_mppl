<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profileIndex()
    {
        $user = User::where('id', auth()->user()->id)->get()->first();
        return view('dashboard.profile.editProfile', [
            'title' => 'Profile',
            'user' => $user,
        ]);
    }

    public function profileEdit(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:30',
            'username' => ['required', 'unique:users,username,' . $request->user()->id],
            'email' => 'required',
            'country' => 'required'
        ]);
        User::where('id', $request->user()->id)->update($validatedData);


        return redirect('/dashboard/profile/' . $request->user()->id)->with('success', 'Profile Edit Success');
    }
}
