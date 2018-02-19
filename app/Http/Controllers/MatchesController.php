<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use App\User;
use Auth;

class MatchesController extends Controller
{
    //
    public function start()
    {
    	
    }
    public function destroy(Request $request)
    {
    	$user = Auth::user();
    	Match::unmatchToday($user);
    	return redirect()->to('/dashboard');
    }
}
