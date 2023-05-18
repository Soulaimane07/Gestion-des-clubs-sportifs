<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileAdminController extends Controller
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
        //
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
    public function update(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'string'],
            'fname' => ['string'],
            'lname' => ['string'],
            'password' => ['required', 'string'],
        ]);
        
        $profile = User::find(Auth::user()->id);
        $profile->email = $request->input('email');
        $profile->fname = $request->input('fname');
        $profile->lname = $request->input('lname');

        if(Hash::needsRehash($request->password)){
            $profile->password = Hash::make($request->password);
        }else {
            $profile->password = $request->password;
        }

        $profile->save();
        return Redirect('/profile');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
