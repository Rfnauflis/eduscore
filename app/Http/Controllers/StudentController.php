<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Extraculicular;
use App\Models\Student;
use Dotenv\Util\Str;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|unique:students',
            'password' => 'required|min:8',
            'gender' => 'required',
            'nis' => 'required|unique:students|max:6',
            'contact' => 'required|min:12',
            'classroom_id' => 'required',

        ]);


        if ($validator->fails()) {
           
            return redirect()->back()->withErrors($validator)->withInput();
        }
  
        Student::create([
            'name' => $request->name,
            'nis' => $request->nis,
            'email' => $request->email,
            'contact' => $request->contact,
            'gender' => $request->gender,
            'classroom_id' => $request->classroom_id,
            'password' => Hash::make($request->password),
        ]);
        // return
        return redirect()->route('students.loginPage')->with('message', 'Akun Telah dibuat. Silakan masuk.');
    }

    public function loginPage()
    {
        return view("student.sign-in");
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        $success = Auth::guard('student')->attempt($credentials);

        if ($success) {
            $request->session()->regenerate();
            return redirect('/dashboard'); // Redirect ke dashboard setelah login
        }

        // Jika login gagal
        return back()->withErrors([
            'message' => 'Email atau password salah',
        ])->withInput();
    }
    public function logout(Request $request)
    {
        Auth::guard('student')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/students/sign-in')->with('message', 'Anda telah berhasil keluar.');
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
        $student = Student::find($id);
        return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'nis' => 'required',
            'gender' => 'required',
            'contact' => 'required',
            'classroom_id' => 'required',
            'ekstras_id' => 'required',
        ]);

        $student = Student::find($id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->nis = $request->nis;
        $student->gender = $request->gender;
        $student->contact = $request->contact;
        $student->classroom_id = $request->classroom_id;
        

        foreach ($request->ekstras_id as $ekstra) {
            $student->ekstras()->sync($ekstra);
        }
        
        $student->save();

        return redirect()->route('ekstrakulikuler.pendaftar');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
        $student->delete();

        return redirect()->route('ekstrakulikuler.pendaftar');
    }

    public function registerPage() {

        return view('student.daftar');
    }

    // public function registrer(Request $request) {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|string',
    //         'gender' => 'required',
    //         'nis' => 'required|unique:students|max:6',
    //         'contact' => 'required|min:12',
    //         'classroom_id' => 'required',
    //     ]);
        
    //     if ($validator->fails()) {
        
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }
  
    //     // Student::create([
    //     //     'name' => $request->name,
    //     //     'nis' => $request->nis,
    //     //     'email' => $request->email,
    //     //     'contact' => $request->contact,
    //     //     'gender' => $request->gender,
    //     //     'classroom_id' => $request->classroom_id,
    //     // ]);
    //     // // return
    //     // return redirect()->route('students.loginPage')->with('message', 'Akun Telah dibuat. Silakan masuk.');
    // } 
}
