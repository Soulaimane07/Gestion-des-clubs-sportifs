<?php

namespace App\Http\Controllers;

use App\Models\Tournoie;
use Illuminate\Http\Request;

class TournoieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tournoies = Tournoie::all();
        return view('Tournoie/Tournoie', compact('tournoies') );
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
            'title' => ['required', 'string', 'max:100'],
            'desc' => ['required', 'string', 'max:1200'],
            'dateDebut' => ['required', 'string',],
        ]);
        
        $tournoie = new Tournoie;
        $tournoie->title = $request->input('title');
        $tournoie->desc = $request->input('desc');
        $tournoie->dateDebut = $request->input('dateDebut');
        $tournoie->dateFin = $request->input('dateFin');

        $size = $request->file('image')->getSize();
        $name = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/images/tournoies', $name);
        $tournoie->image = $name;

        $tournoie->save();
        return Redirect('/tournoie');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tournoie = Tournoie::find($id);
        return view('Tournoie/Details',['tournoie'=>$tournoie]);
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
        $tournoie = Tournoie::find($request->id);
        $tournoie->title = $request->title;
        $tournoie->desc = $request->desc;

        if($request->file('image')){
            $name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images/tournoies', $name);
            $tournoie->image = $name;
        }

        $tournoie->dateDebut = $request->dateDebut;
        $tournoie->dateFin = $request->dateFin;

        $result= $tournoie->save();

        return redirect('/tournoie');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Tournoie::find($id)->delete();
        return redirect('/tournoie');
    }
}
