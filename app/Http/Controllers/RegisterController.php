<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register()
    {
        return view('register'); 
    }

    public function registerProcess(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:login,email',
            'phone' => 'required',
            'dob' => 'required|date',
            'address' => 'required',
            'password' => 'required|min:6',
            'user_type' => 'required'
        ]);

        $login = Login::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'dob' => $request->dob,
            'address' => $request->address,
            'password' => $request->password, // ⚠️ Plain text (not secure)
            'user_type' => $request->user_type,
        ]);

        return redirect('/login')->with('success', 'Registration successful! Please login.');
    }

    public function editProfile($id)
    {
        if (Auth::id() != $id) {
            abort(403, 'Unauthorized action.');
        }

        $login = Login::findOrFail($id);
        return view('regiprofile', compact('login'));
    }

    public function regiprofile(Request $request)
    {
        $id = $request->id;

        if (Auth::id() != $id) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:login,email,' . $id,
            'phone' => 'required',
            'dob' => 'required|date',
            'address' => 'required',
            'user_type' => 'required',
            'password' => 'nullable|min:6',
        ]);

        $login = Login::findOrFail($id);

        $login->name = $request->name;
        $login->email = $request->email;
        $login->phone = $request->phone;
        $login->dob = $request->dob;
        $login->address = $request->address;
        $login->user_type = $request->user_type;
        $login->password =$request->password;
        

        $login->save();

        return redirect()->route('profile.edit', $id)->with('success', 'Profile updated successfully!');
    }
}
