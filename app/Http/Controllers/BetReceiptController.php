<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
using BetReceipt;
class BetReceiptController extends Controller
{
    //
	public function printToReceipt(Request $request)
	{

		$outComes=$request->input('outcomes');
		$amountPlaced=$request->input('WagerAmount');
		$totalOdds=$request->input('TotalOdds');
		$ticketBarCode=str_random(10);

		$receiptData=array('outcomes'=>$outComes,'amountplaced'=$amountPlaced,'totalOdds'=>$totalOdds);

		DB::table('bet_receipts')->insert($receiptData);

	 $barcode=BetReceipt::where('barcode','=',Input::get($ticketBarCode))->first();
	 if($barcode===null)
	 {
	 	
		DB::table('bet_receipts')->insert($receiptData);
	 }

      else
      {

			$ticketBarCode=str_random(10);
			DB::table('bet_receipts')->insert($receiptData);


       }

		# code...
		$betreceipts=BetReceipt::all();
		return view('betreceipts',['betReceipts'=>$betreceipts])

	}

}
