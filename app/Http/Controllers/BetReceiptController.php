<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
using BetReceipt;
class BetReceiptController extends Controller
{
    //
	public function index()
	{
		# code...
		$betreceipts=BetReceipt::all();
		return view('betreceipts',['betReceipts'=>$betreceipts])

	}

}
