<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annance;
use App\Models\Tournoie;
use App\Models\Etab;

class HomeAdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $etabs = Etab::all();
        $tournoies = Tournoie::all();
        $annances = Annance::all();
        return view('/Admin/index',['etabs'=>$etabs, 'tournoies'=>$tournoies, 'annances'=>$annances]);
    }
}
