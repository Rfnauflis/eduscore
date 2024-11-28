<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Extraculicular;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExtraculicularController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $ekstras = Extraculicular::query();

        if ($request->has('name')) {
            $name = $request->query('name');
            $ekstras = $ekstras->where('name', $name);
        }
    
        $ekstras = Extraculicular::all();

        return view('dashboard.index', compact('ekstras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ekstrakulikuler.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'admin_id' => 'required',
        ]);


        Extraculicular::create([
            'name' => $request->name,
            'admin_id' => $request->admin_id,
        ]);
        return redirect()->route('dashboard')->with('message', 'Ekstra Telah dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
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
