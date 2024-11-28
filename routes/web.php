<?php

use App\Http\Controllers\ExtraculicularController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Extraculicular;
use App\Models\Student;
use App\Models\User;

Route::get('/', function () {
    return redirect('/students/sign-in');
});


// Route::get('/dashboard', function () {
//     return view('dashboard.index');
// })->middleware('auth')->name('dashboard');

Route::prefix('dashboard')->group(function () {
    Route::get('/', function () {
        $student = null;
        $admin = null;
        $ekstras = Extraculicular::all();
        return view('dashboard.index', compact('admin', 'ekstras'));
    })->name('dashboard');
});

Route::prefix('ekstrakulikuler')->group(function () {
    Route::get('/add', function () {
        $pembinas = User::all();
        return view('ekstrakulikuler.add', compact('pembinas'));
    })->name('ekstrakulikuler.add');
    Route::post('add', [ExtraculicularController::class, 'store'])->name('add.ekstra');
 
    Route::get('/listing', function () {
        $ekstras = Extraculicular::all();
        return view('ekstrakulikuler.listing', compact('ekstras'));
    })->name('ekstrakulikuler.listing');
    Route::get('/edit/{id}', function ($id) {
        $student = Student::find($id);
        if (!$student) {
            return redirect()->route('ekstrakulikuler.listing')->with('error', 'Siswa tidak ditemukan');
        }
        return view('student.edit', compact('student'));
    })->name('student.edit');

    Route::get('/pendaftar', function () {
        $students = Student::all();
        return view('ekstrakulikuler.pendaftar', compact('students'));
    })->name('ekstrakulikuler.pendaftar');

});

Route::prefix("admin")->group(function () {
    Route::get('/sign-up', [UserController::class, 'registerPage'])->name('register');
    Route::get('/sign-in', [UserController::class, 'loginPage'])->name('login');
    Route::post('sign-up', [UserController::class, 'register'])->name('admin.register');
    Route::post('sign-in', [UserController::class, 'login'])->name('admin.login'); // Menggunakan route 'login'
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin.edit');
    Route::put('/edit/{id}', [UserController::class, 'update'])->name('admin.update');
    Route::post('sign-out', [UserController::class, 'logout'])->name('admin.logout');
});

Route::prefix('students')->group(function () {
    Route::get('/sign-in', [StudentController::class, 'loginPage'])->name('sign-in');
    Route::get('/sign-up', [StudentController::class, 'create'])->name('sign-up');
    Route::post('sign-up', [StudentController::class, 'store'])->name('student.store');
    Route::post('sign-in', [StudentController::class, 'login'])->name('students.login');
    Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/edit/{id}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('delete/{id}', [StudentController::class, 'delete'])->name('students.destroy');
    Route::post('sign-out', [StudentController::class, 'logout'])->name('students.logout');
    Route::get('/register', [StudentController::class, 'registerPage'])->name('students.register');
});
