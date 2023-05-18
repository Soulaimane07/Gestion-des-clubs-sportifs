<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Etab;

use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('SAdmin/Users/Users', compact('users') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function Cetabs()
    {
        $etabs = Etab::all();
        return view('SAdmin/Users/Create', compact('etabs') );
    }
    
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
            'email' => ['required', 'email', 'string'],
            'fname' => ['string'],
            'lname' => ['string'],
            'password' => ['required', 'string'],
            'etab' => ['required', 'string'],
        ]);
        
        $user = new User;
        $user->email = $request->input('email');
        $user->fname = $request->input('fname');
        $user->lname = $request->input('lname');
        $user->etab = $request->input('etab');
        $user->password = Hash::make($request['password']);

        $user->save();
        return Redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        $etabs = Etab::all();

        return view('SAdmin/Users/Details',['user'=>$user, 'etabs'=>$etabs]);
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
        $user = User::find($request->id);
        $user->email = $request->email;
        $user->etab = $request->etab;
        $user->fname = $request->fname;
        $user->lname = $request->lname;

        if(Hash::needsRehash($request->password)){
            $user->password = Hash::make($request->password);
        }else {
            $user->password = $request->password;
        }
        
        $result= $user->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return redirect('/admin/users');
    }
}
