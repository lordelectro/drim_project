<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BetSlipController extends Controller
{
    	
 		public function index()
	{
    	# code...
		//$betreceipts=BetReceipt::all();
		return view('Betslip',['betSlip'=>'Betslip'])

	}
}
