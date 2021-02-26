<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class RankingController extends Controller
{
    public function index()
    {

    $rankings =  DB::select("call getRanking");
      return view('rankings.index')->with('rankings', $rankings);
    }
}
