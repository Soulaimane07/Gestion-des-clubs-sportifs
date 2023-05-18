<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tournoie;
use App\Models\Player;
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

    public function storeP(Request $request)
    {
        // $request->validate([
        //     'title' => ['required', 'string', 'max:100'],
        //     'desc' => ['required', 'string', 'max:1200'],
        //     'dateDebut' => ['required', 'string',],
        // ]);

        $player = new Player;
        $player->CNI = $request->input('CNI');
        $player->CNE = $request->input('CNE');
        $player->fname = $request->input('fname');
        $player->lname = $request->input('lname');
        $player->etab = $request->input('etab');
        $player->filier = $request->input('filier');
        $player->tournoie = $request->input('tournoie');

        if($request->file('CNIImage')){
            $name = $request->file('CNIImage')->getClientOriginalName();
            $request->file('CNIImage')->storeAs('public/images/players/cin', $name);
            $player->CNIImage = $name;
        }
        if($request->file('attestation')){
            $name = $request->file('attestation')->getClientOriginalName();
            $request->file('attestation')->storeAs('public/images/players/attestation', $name);
            $player->attestation = $name;
        }
        if($request->file('image')){
            $name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images/players/image', $name);
            $player->image = $name;
        }

        $player->save();
        return Redirect()->back();
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

        $tournoie = Tournoie::find($id);
        $players = Player::where('etab', Auth::user()->etab)->where('tournoie', $id)->get();

        if (Participations::where('tournoie', $id)->where('etab', Auth::user()->etab)->exists()) {
            $participation = true;
        } else {
            $participation = false;
        }

        return view('Admin/Tournoie/Details',['tournoie'=>$tournoie, 'players'=>$players, "isParticipated"=>$participation]);
    }
    
    public function player(string $tournoiId, string $playerId)
    {
        $tournoie = Tournoie::find($tournoiId);
        $player = Player::find($playerId);
        // $players = Player::where('etab', Auth::user()->etab)->where('tournoie', $id)->get();

        return view('Admin/Tournoie/Player',['tournoie'=>$tournoie, 'player'=>$player]);
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
    public function destroyParticipation(string $tournoieId)
    {
        Participations::where('tournoie', $tournoieId)->where('etab', Auth::user()->etab)->delete();
        Player::where('tournoie', $tournoieId)->where('etab', Auth::user()->etab)->delete();
        return redirect(url('/tournoie/'.$tournoieId));
    }
}
