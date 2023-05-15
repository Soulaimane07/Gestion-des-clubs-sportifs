<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annance;

class AnnanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $annances = Annance::all();
        return view('Annonce/Annance', compact('annances') );
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
            // 'image' => ['string'],
            // 'video' => ['string']
        ]);
        
        $annance = new Annance;
        $annance->title = $request->input('title');
        $annance->desc = $request->input('desc');
        // $annance->video = $request->input('video');

        if($request->file('image')){
            $name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images/annaces', $name);
            $annance->image = $name;
        }
        
        if($request->file('video')){
            $nameV = $request->file('video')->getClientOriginalName();
            $request->file('video')->storeAs('public/videos/annaces', $name);
            $annance->video = $name;
        }
        
        $annance->save();
        return Redirect('/admin/annance');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $annance = Annance::find($id);
        return view('Annonce/Details',['annance'=>$annance]);
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
        $annance = Annance::find($request->id);
        $annance->title = $request->title;
        $annance->desc = $request->desc;

        if($request->file('image')){
            $name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images/annaces', $name);
            $annance->image = $name;
        }

        if($request->file('video')){
            $nameV = $request->file('video')->getClientOriginalName();
            $request->file('video')->storeAs('public/videos/annaces', $nameV);
            $annance->video = $nameV;
        }

        $result= $annance->save();

        return redirect('/admin/annance');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Annance::find($id)->delete();
        return redirect('/admin/annance');
    }
}
