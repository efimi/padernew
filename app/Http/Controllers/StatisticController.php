<?php

namespace App\Http\Controllers;

use App\Share;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function shared()
    {
    	$shared = new Statistic;
    	$shared->type = "shared link";
    	$shared->save();
    	return redirect()->to('/');
    }
    public function click()
    {
		$shared = new Statistic;
    	$shared->type = "via card";
    	$shared->save();
    	return redirect()->to('/');
    }
}
