<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Tournoie;
use PDF;
use Illuminate\Support\Facades\Auth;


class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function PlayersCardsPDF(string $id)
    {
        $players = Player::where('tournoie', $id)->where('etab',Auth::user()->etab)->get();
        $tournoie = Tournoie::where('id', $id)->get();
            
        $pdf = PDF::loadView('PDF/PlayersCards', compact('players', 'tournoie'));
     
        return $pdf->stream();
    }
    
    public function PlayerstablePDF(string $id)
    {
        $players = Player::where('tournoie', $id)->where('etab',Auth::user()->etab)->get();
        $tournoie = Tournoie::where('id', $id)->get();
            
        $pdf = PDF::loadView('PDF/PlayersTable', compact('players', 'tournoie'));
     
        return $pdf->stream();
    }
}