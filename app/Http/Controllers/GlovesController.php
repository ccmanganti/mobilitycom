<?php

namespace App\Http\Controllers;

use App\Models\Gloves;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GlovesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gloves = Gloves::all();
        return response()->json($gloves);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $glove = New Gloves;
        $glove->serial_number = $request->serial_number;

        return response()->json($glove, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Gloves $gloves)
    {
        return response()->json($gloves, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gloves $gloves)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        if ($request->filled('user_id')){
            $gloves = Gloves::where('serial_number', $request->serial_number)->first();
            if (!$gloves){
                return response()->json(['message' => 'Glove not found'], 404);
            }
            $user = Auth::id();
            $gloves->user_id = $user;
        }
        $gloves->save();
        return response()->json($gloves, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gloves $gloves)
    {
        $gloves->delete();
        return response()->json(['message' => 'Glove deleted successfully'], 200);
    }
    
    //////////////////////
    // CUSTOM FUNCTIONS //
    //////////////////////

    public function check_serial(Request $request){
        $checkGloves = Gloves::where('serial_number', $request->serial_number)->first();
        if (!$checkGloves){
            $gloves = New Gloves;
            $gloves->serial_number = $request->serial_number;
            $gloves->save();
            return response()->json($gloves, 201);
        }
        return response()->json(['message' => 'Glove is registered', 'glove' => $checkGloves], 200);
    }
}