<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participations;
use Illuminate\Support\Facades\Auth;

class ParticipationsAdminController extends Controller
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
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tournoie' => ['required', 'string'],
            'etab' => ['required', 'string'],
        ]);
        
        $participation = new Participations;
        $participation->tournoie = $request->input('tournoie');
        $participation->etab = $request->input('etab');

        $participation->save();
        return Redirect('/tournoie');
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
        Participations::where('tournoie', $id)->where('etab', Auth::user()->etab)->delete();
        return redirect('/tournoie');
    }
}
