<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
            'active' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->with('loginError', 'Login failed!');
    }

    // ---------------

    public function profile()
    {
        if (!auth()->user()->id) {
            abort(404);
        }
        return view('profile.index', [
            'title' => 'MY Profile',
            'active' => 'profile',
            'profile' => auth()->user()
        ]);
    }

    public function edit(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'password' => 'required|min:5|max:255'
        ];

        if ($request->username != auth()->user()->username) {
            $rules['username'] = 'required|min:3|max:255|unique:users';
        }

        if ($request->email != auth()->user()->email) {
            $rules['email'] = 'required|email|unique:users';
        }

        $validatedData = $request->validate($rules);

        // $validatedData['password'] = bcrypt($validatedData['password']);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::where('id', auth()->user()->id)
            ->update($validatedData);

        // $request->session()->flash('success', 'Registration successful! Please login');

        return redirect('/dashboard')->with('success', 'Berhasil Memperbarui Profile');
    }

    // ---------------

    public function certi()
    {
        if (!auth()->user()->id) {
            abort(404);
        }
        $certificate = Certificate::where('user_id', auth()->user()->id)->get();
        return view('profile.certificate', [
            'title' => 'MY Certificate',
            'certificate' => $certificate
        ]);
    }

    public function show(Certificate $certificate)
    {
        if ($certificate->user_id != auth()->user()->id) {
            abort(404);
        }

        return view('profile.show', [
            'title' => 'MY Certificate',
            'certi' => $certificate,
        ]);
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}
