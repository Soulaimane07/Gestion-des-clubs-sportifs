<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etab;
use Illuminate\Support\Facades\Hash;


class EtabController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etabs = Etab::all();
        return view('Etabs/Etabs', compact('etabs') );
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
            'etab' => ['required', 'string'],
            'bref' => ['required', 'string'],
        ]);
        
        $etab = new Etab;
        $etab->etab = $request->input('etab');
        $etab->bref = $request->input('bref');

        if($request->file('image')){
            $name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images/etabs', $name);
            $etab->image = $name;
        }

        $etab->save();
        return Redirect('/etablissements');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $etab = Etab::find($id);
        return view('Etabs/Details',['etab'=>$etab]);
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
        $etab = Etab::find($request->id);
        $etab->etab = $request->etab;
        $etab->bref = $request->bref;
        
        if($request->file('image')){
            $name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images/etabs', $name);
            $etab->image = $name;
        }

        $result= $etab->save();
        return redirect('/etablissements');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Etab::find($id)->delete();
        return redirect('/etablissements');
    }
}
