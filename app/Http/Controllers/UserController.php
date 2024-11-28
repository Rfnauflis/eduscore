<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function registerPage()
    {
        return view('admin.sign-up');
    }

    public function register(Request $request)
    {
        // validasi data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'nip' => 'required|unique:users',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // create data
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash password
            'nip' => $request->nip,
        ]);

        // redirect ke halaman sign-in dengan pesan sukses
        return redirect()->route('login')->with('message', 'Akun Telah dibuat. Silakan masuk.');
    }

    public function loginPage()
    {
        return view("admin.sign-in");
    }

    public function login(Request $request)
    {
        // validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
    
        // Coba login dengan Auth::attempt
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard'); // Redirect ke dashboard
        }

        // Jika gagal, kembalikan dengan pesan error
        return back()->withErrors([
            'message' => 'Email atau password salah',
        ])->withInput();
        
    }

    public function edit (string $id) {
        $admin = User::find($id);
        return view('admin.edit', compact('admin'));
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'nip' => 'required',
        ]);

        $admin = User::find($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->nip = $request->nis;
        $student->save();

        return redirect()->route('ekstrakulikuler.listing');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/sign-in')->with('message', 'Anda telah berhasil keluar.');
    }
}


