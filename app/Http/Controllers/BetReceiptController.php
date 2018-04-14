<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
