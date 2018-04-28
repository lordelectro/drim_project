<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlacebetController extends Controller
{
    
    	$betreceipts=BetReceipt::all();
		return view('betreceipts',['betReceipts'=>$betreceipts])

}
