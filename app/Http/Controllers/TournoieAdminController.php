<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tournoie;
use App\Models\Participations;
use Illuminate\Support\Facades\Auth;


class TournoieAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tournoies = Tournoie::all();
        return view('Admin/Tournoie/Tournoie', compact('tournoies') );
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        // ;
        $tournoie = Tournoie::find($id);

        if (Participations::where('tournoie', $id)->where('etab', Auth::user()->etab)->exists()) {
            $participation = true;
        } else {
            $participation = false;
        }

        return view('Admin/Tournoie/Details',['tournoie'=>$tournoie, "isParticipated"=>$participation]);
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
