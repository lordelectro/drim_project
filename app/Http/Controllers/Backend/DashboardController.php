<?php

namespace App\Http\Controllers\Backend;

use App\country;
use App\event;
use App\Http\Controllers\Controller;
use App\odd;
use DB;
use PDF;
use Illuminate\Support\Carbon;
use \Illuminate\Http\Request;

use \Milon\Barcode\DNS1D;

use Webpatser\Uuid\Uuid;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */

    public function index()
    {

        $id = 169;
       $country = country::all();
        $match = DB::table('events')
            ->join('odds', 'events.match_id', '=', 'odds.match_id')
            ->where('odds.odd_bookmakers','=','1xBet')
           ->where('country_id','=',$id)
            ->paginate(15);

        $soccer = array(
            'match'=>$match,
            'country'=>$country
        );

        return view('backend.dashboard')->with($soccer);
    }


    public function other_country(Request $request)
    {


        $id = $request->country_id;
        $bet = $request->bet;
        switch ($bet) {
            case 1:
                $country = country::all();
                $match = DB::table('events')
                    ->join('odds', 'events.match_id', '=', 'odds.match_id')
                    ->where('odds.odd_bookmakers', '=', '1xBet')
                    ->where('country_id', '=', $id)
                    ->paginate(15);

                $soccer = array(
                    'match' => $match,
                    'country' => $country

                );

                return view('backend.dashboard')->with($soccer);
                break;
            case 2:
                $country = country::all();
                $match = DB::table('events')
                    ->join('odds', 'events.match_id', '=', 'odds.match_id')
                    ->where('odds.odd_bookmakers', '=', '1xBet')
                    ->where('country_id', '=', $id)
                    ->paginate(15);

                // dd($match);exit;

                $soccer = array(
                    'match' => $match,
                    'country' => $country

                );

                return view('backend.double')->with($soccer);
                break;
            case 3:
                $country = country::all();
                $match = DB::table('events')
                    ->join('odds', 'events.match_id', '=', 'odds.match_id')
                    ->where('odds.odd_bookmakers', '=', '1xBet')
                    ->where('country_id', '=', $id)
                    ->paginate(15);

                // dd($match);exit;

                $soccer = array(
                    'match' => $match,
                    'country' => $country

                );

                return view('backend.over_under_0.5')->with($soccer);
                break;


            default:

                $id = 169;
                $country = country::all();
                $match = DB::table('events')
                    ->join('odds', 'events.match_id', '=', 'odds.match_id')
                    ->where('odds.odd_bookmakers','=','1xBet')
                    ->where('country_id','=',$id)
                    ->paginate(15);

                $soccer = array(
                    'match'=>$match,
                    'country'=>$country
                );

                return view('backend.dashboard')->with($soccer);

               break;
        }

    }

    public function odds(){

    $ods = DB::table('events')
        ->join('odds', 'events.match_id', '=', 'odds.match_id')
        ->where('odds.odd_bookmakers','=','1xBet')
        ->orderBy('odd_date', 'desc')
        ->paginate(15);
    
       $data = array(
           'ods'=>$ods
       );

       // $pdf = PDF::loadView('backend.odds',$data);
       // return $pdf->stream();

        return view('backend.odds_show')->with($data);
    }

    public function print_odds(){
        $today = Carbon::now()->subDays(9);

        //echo $today;

        $ods = DB::table('events')
            ->join('odds', 'events.match_id', '=', 'odds.match_id')
            ->where('odds.odd_bookmakers','=','1xBet')
           // ->where('match_date','=',$today)
            ->get();

        $data = array(
            'ods'=>$ods
        );

         $pdf = PDF::loadView('backend.odds',$data);
         $pdf->setPaper('A4', 'landscape');

         return $pdf->stream();
    }


        public function betSlip(){

        

        return view('backend.Betslip',['betSlip'=>'Betslip']);
    }


/* Function starts here*/

    public function printToReceipt(Request $request)
    {

        $outComes=$request->input('outcomes');
        $title=$request->input('title');

        $amountPlaced=$request->input('WagerAmount');

         $totalOdds=$request->input('TotalOdds');

        $possibleWin=$amountPlaced* $totalOdds;

        $possibleWin=number_format((float)$possibleWin, 0, '.', '');

       // dd($possibleWin);

      
        $ticketBarCode=str_random(10);

         $json = json_decode($outComes);

        $receiptData=array('outcomes'=>$json,'amountplaced'=>$amountPlaced,
            'totalOdds'=>$totalOdds,'ticketBar'=> $ticketBarCode,
            'possibleWin'=>$possibleWin,'title'=>$title);

      // $json = json_decode($outComes);

     // dd($json);
/*

    echo $possibleWin;
      foreach ($json as $k) {
           
           echo $k->Title;
           echo $k->EventTitle;
           echo $k->StartDate;
       }

       */
                   $uuid=Uuid::generate(4)->string;

       // dd($uuid);


        $d = new DNS1D();
        $d->setStorPath(__DIR__."/cache/");
        echo $d->getBarcodeHTML("9780691147727", "EAN13");
           
    
//echo $json['productId'];
//echo $json['status'];
//echo $json['opId'];




        
    //    $receiptData['outcomes'];





/*
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
*/
        # code...
       // $betreceipts=BetReceipt::all();
        return view('betreceipts',['betReceipts'=>$receiptData]);

    }


/* Function ends here*/

    public function country(){

        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://apifootball.com/api/?action=get_countries&APIkey=9fcf2ce075e23a4abcf1b2cf9b6cc88d2126efca74c77bc19bac705cb3e6444c');

        $data = $res->getBody();
        $country = \GuzzleHttp\json_decode($data);

        foreach ($country as $c):
            $id = $c->country_id;
            $name = $c->country_name;

            $data = array('country_name'=>$name, 'country_id'=>$id);
             country::updateOrCreate($data);

        endforeach;

        return redirect()->route('admin.dashboard')->withFlashSuccess(__('country updated successfully'));

    }


    public function download_odds()
    {

        $today = Carbon::now();
        $from = Carbon::now()->subDays(3);
        $to = $today;
        $client = new \GuzzleHttp\Client();
        $odd = $client->request('GET', 'https://apifootball.com/api/?action=get_odds&from=' . $from . '&to=' . $to . '&APIkey=9fcf2ce075e23a4abcf1b2cf9b6cc88d2126efca74c77bc19bac705cb3e6444c');
        $d = $odd->getBody();
        $od = \GuzzleHttp\json_decode($d);
        // dd($od);exit;

        foreach ($od as $key) {
            $match_id = $key->match_id;
            $odd_date = $key->odd_date;
            $odd_bookmakers = $key->odd_bookmakers;
            $odd_1 = $key->odd_1;
            $odd_x = $key->odd_x;
            $odd_2 = $key->odd_2;
            $odd_1x = $key->odd_1x;
            $odd_12 = $key->odd_12;
            $odd_x2 = $key->odd_x2;
            $ah_4_5_1 = $key->{'ah-4.5_1'};
            $ah_4_5_2 = $key->{'ah-4.5_2'};
            $ah_4_1 = $key->{'ah-4_1'};
            $ah_4_2 = $key->{'ah-4_2'};
            $ah_3_5_1 = $key->{'ah-3.5_1'};
            $ah_3_5_2 = $key->{'ah-3.5_2'};
            $ah_3_1 = $key->{'ah-3_1'};
            $ah_3_2 = $key->{'ah-3_2'};
            $ah_2_5_1 = $key->{'ah-2.5_1'};
            $ah_2_5_2 = $key->{'ah-2.5_2'};
            $ah_2_1 = $key->{'ah-2_1'};
            $ah_2_2 = $key->{'ah-2_2'};
            $ah_1_5_1 = $key->{'ah-1.5_1'};
            $ah_1_5_2 = $key->{'ah-1.5_2'};
            $ah_1_1 = $key->{'ah-1_1'};
            $ah_1_2 = $key->{'ah-1_2'};
            $ah0_1 = $key->{'ah0_1'};
            $ah0_2 = $key->{'ah0_2'};
            $ah_0_5_1 = $key->{'ah+0.5_1'};
            $ah_1_1 = $key->{'ah+1_1'};
            $ah_1_2 = $key->{'ah+1_2'};
            $ah_1_5_1 = $key->{'ah+1.5_1'};
            $ah_1_5_2 = $key->{'ah+1.5_2'};
            $ah_2_1 = $key->{'ah+2_1'};
            $ah_2_2 = $key->{'ah+2_2'};
            $ah_2_5_1 = $key->{'ah+2.5_1'};
            $ah_2_5_2 = $key->{'ah+2.5_2'};
            $ah_3_1 = $key->{'ah+3_1'};
            $ah_3_2 = $key->{'ah+3_2'};
            $ah_3_5_1 = $key->{'ah+3.5_1'};
            $ah_3_5_2 = $key->{'ah+3.5_2'};
            $ah_4_1 = $key->{'ah+4_1'};
            $ah_4_2 = $key->{'ah+4_2'};
            $ah_4_5_1 = $key->{'ah+4.5_1'};
            $ah_4_5_2 = $key->{'ah+4.5_2'};
            $o_0_5 = $key->{'o+0.5'};
            $u_0_5 = $key->{'u+0.5'};
            $o_1 = $key->{'o+1'};
            $u_1 = $key->{'u+1'};
            $o_1_5 = $key->{'o+1.5'};
            $u_1_5 = $key->{'u+1.5'};
            $o_2 = $key->{'o+2'};
            $u_2 = $key->{'u+2'};
            $o_2_5 = $key->{'o+2.5'};
            $u_2_5 = $key->{'u+2.5'};
            $o_3 = $key->{'o+3'};
            $u_3 = $key->{'u+3'};
            $o_3_5 = $key->{'o+3.5'};
            $u_3_5 = $key->{'u+3.5'};
            $o_4 = $key->{'o+4'};
            $u_4 = $key->{'u+4'};
            $o_4_5 = $key->{'o+4.5'};
            $u_4_5 = $key->{'u+4.5'};
            $o_5 = $key->{'o+5'};
            $u_5 = $key->{'u+5'};
            $o_5_5 = $key->{'o+5.5'};
            $u_5_5 = $key->{'u+5.5'};
            $bts_yes = $key->{'bts_yes'};
            $bts_no = $key->{'bts_no'};


            $data = array('match_id' => $match_id,
                'odd_date' => $odd_date,
                'odd_bookmakers' => $odd_bookmakers,
                'odd_1' => $odd_1,
                'odd_x' => $odd_x,
                'odd_2' => $odd_2,
                'odd_1x' => $odd_1x,
                'odd_12' => $odd_12,
                'odd_x2' => $odd_x2,
                'ah-4_5_1' => $ah_4_5_1,
                'ah-4_5_2' => $ah_4_5_2,
                'ah-4_1' => $ah_4_1,
                'ah-4_2' => $ah_4_2,
                'ah-3_5_1' => $ah_3_5_1,
                'ah-3_5_2' => $ah_3_5_2,
                'ah-3_1' => $ah_3_1,
                'ah-3_2' => $ah_3_2,
                'ah-2_5_1' => $ah_2_5_1,
                'ah-2_5_2' => $ah_2_5_2,
                'ah-2_1' => $ah_2_1,
                'ah-2_2' => $ah_2_2,
                'ah-1_5_1' => $ah_1_5_1,
                'ah-1_5_2' => $ah_1_5_2,
                'ah-1_1' => $ah_1_1,
                'ah-1_2' => $ah_1_2,
                'ah0_1' => $ah0_1,
                'ah0_2' => $ah0_2,
                'ah+0_5_1' => $ah_0_5_1,
                'ah+1_1' => $ah_1_1,
                'ah+1_2' => $ah_1_2,
                'ah+1_5_1' => $ah_1_5_1,
                'ah+1_5_2' => $ah_1_5_2,
                'ah+2_1' => $ah_2_1,
                'ah+2_2' => $ah_2_2,
                'ah+2_5_1' => $ah_2_5_1,
                'ah+2_5_2' => $ah_2_5_2,
                'ah+3_1' => $ah_3_1,
                'ah+3_2' => $ah_3_2,
                'ah+3_5_1' => $ah_3_5_1,
                'ah+3_5_2' => $ah_3_5_2,
                'ah+4_1' => $ah_4_1,
                'ah+4_2' => $ah_4_2,
                'ah+4_5_1' => $ah_4_5_1,
                'ah+4_5_2' => $ah_4_5_2,
                'o+0_5' => $o_0_5,
                'u+0_5' => $u_0_5,
                'o+1' => $o_1,
                'u+1' => $u_1,
                'o+1_5' => $o_1_5,
                'u+1_5' => $u_1_5,
                'o+2' => $o_2,
                'u+2' => $u_2,
                'o+2_5' => $o_2_5,
                'u+2_5' => $u_2_5,
                'o+3' => $o_3,
                'u+3' => $u_3,
                'o+3_5' => $o_3_5,
                'u+3_5' => $u_3_5,
                'o+4' => $o_4,
                'u+4' => $u_4,
                'o+4_5' => $o_4_5,
                'u+4_5' => $u_4_5,
                'o+5' => $o_5,
                'u+5' => $u_5,
                'o+5_5' => $o_5_5,
                'u+5_5' => $u_5_5,
                'bts_yes' => $bts_yes,
                'bts_no' => $bts_no
            );
            //dd($data);exit;
            odd::updateOrCreate($data);
        }

        return redirect()->route('admin.odds')->withFlashSuccess(__('odds updated successfully'));
    }

        public function download_events(){

            $client = new \GuzzleHttp\Client();
            $today = Carbon::now();
            //$yesturday = Carbon::yesterday();
            $from = Carbon::now()->subDays(3);
            $to   = Carbon::tomorrow();
            $res = $client->request('GET', 'https://apifootball.com/api/?action=get_events&from='.$from.'&to='.$to.'&APIkey=9fcf2ce075e23a4abcf1b2cf9b6cc88d2126efca74c77bc19bac705cb3e6444c');
            $data = $res->getBody();
            $event = \GuzzleHttp\json_decode($data);

                //dd($event);exit;

                foreach ($event as $ev){
                    $d = array(

                        'match_id'=>$ev->match_id,
                        'country_id'=>$ev->country_id,
                        'country_name'=>$ev->country_name,
                        'league_id'=>$ev->league_id,
                        'league_name'=>$ev->league_name,
                        'match_date'=>$ev->match_date,
                        'match_status'=>$ev->match_status,
                        'match_time'=>$ev->match_time,
                        'match_hometeam_name'=>$ev->match_hometeam_name,
                        'match_hometeam_score'=>$ev->match_hometeam_score,
                        'match_awayteam_name'=>$ev->match_awayteam_name,
                        'match_awayteam_score'=>$ev->match_awayteam_score,
                        'match_hometeam_halftime_score'=>$ev->match_hometeam_halftime_score,
                        'match_awayteam_halftime_score'=>$ev->match_awayteam_halftime_score
                    );
                    event::updateOrCreate($d);

                }

            return redirect()->route('admin.dashboard')->withFlashSuccess(__('matches updated successfully'));

            }



}
