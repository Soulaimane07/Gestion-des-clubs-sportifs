<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Etab;
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
    public function PlayersCardsPDF(string $tournoieId, string $etabId)
    {
        $players = Player::where('tournoie', $tournoieId)->where('etab', $etabId)->get();
        $tournoie = Tournoie::where('id', $tournoieId)->get();
            
        $pdf = PDF::loadView('PDF/PlayersCards', compact('players', 'tournoie'));
     
        return $pdf->stream();
    }
    
    public function PlayerstablePDF(string $tournoieId, string $etabId)
    {
        $players = Player::where('tournoie', $tournoieId)->where('etab', $etabId)->get();
        $etab = Etab::where('bref', $etabId)->get();
        $tournoie = Tournoie::where('id', $tournoieId)->get();
            
        $pdf = PDF::loadView('PDF/PlayersTable', compact('players', 'etab', 'tournoie'));
     
        return $pdf->stream();
    }
}