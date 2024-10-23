<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view('student.sign-up');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
            'gender' => 'required',
            'nis' => 'required|unique:users|digits:18',
            'contact' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Student::create([
            'name' => $request->name,
            'nis' => $request->nis,
            'email' => $request->email,
            'contact' => $request->contact,
            'password' => $request->password,
        ]);

        // return
        return view("student.sign-in", ["message"=>"Akun Telah dibuat"]);
    }

    public function loginPage() {
        return view("student.sign-in");
    }

    public function login(Request $request) {
        $credentials = Validator($request->all(), [
            'email' => 'required',
            'password' => 'required|min:8',
        ]);

        if ($credentials->fails()) {
            return redirect()->back()->withErrors($credentials)->withInput();
        }

        // 
        if (Student::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }
        return back()->withErrors([
           'message' => 'Email atau password salah',
        ]);
    }
    public function logout(Request $request)
    {
        Student::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/auth/sign-in');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
