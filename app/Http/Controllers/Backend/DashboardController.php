<?php

namespace App\Http\Controllers\Backend;

use App\country;
use App\Http\Controllers\Controller;
use App\odd;
use PDF;
use Illuminate\Support\Carbon;
use \Illuminate\Http\Request;

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

        $client = new \GuzzleHttp\Client();
        $today = Carbon::now();
        //$yesturday = Carbon::yesterday();
        $from = Carbon::now()->subDays(4);
        $to   = $today;
        $country_id =$id;
        $res = $client->request('GET', 'https://apifootball.com/api/?action=get_events&from='.$from.'&to='.$to.'&country_id='.$country_id.'&APIkey=f7ff0c4c0538f72b79a3223232ad3d5d38f96bf59bdf745b45762fe06b55d365');
        $data = $res->getBody();
        $event = \GuzzleHttp\json_decode($data);

        $country = country::all();


        //  dd($country); exit;


        //echo $res2->getStatusCode();
        // echo $res->getStatusCode();

        //exit;

        $soccer = array(
            'event'=>$event,
            'country'=>$country
        );

        // dd($soccer);exit;
        return view('backend.dashboard')->with($soccer);

    }

    public function odds(){

        $today = Carbon::now();
        $from = Carbon::now()->subDays(1);
        $to   = $today;
        $client = new \GuzzleHttp\Client();
        $odd = $client->request('GET', 'https://apifootball.com/api/?action=get_odds&from='.$from.'&to='.$to.'&match_id=271420&APIkey=f7ff0c4c0538f72b79a3223232ad3d5d38f96bf59bdf745b45762fe06b55d365');
        $d = $odd->getBody();
        $od = \GuzzleHttp\json_decode($d);

        foreach ($od as $key){
             $match_id = $key->match_id;
             $odd_date= $key->odd_date;
             $odd_bookmakers = $key->odd_bookmakers;

            $data = array('match_id'=>$match_id, 'odd_date'=>$odd_date,'odd_bookmakers'=>$odd_bookmakers);
            //dd($data);exit;
            odd::updateOrCreate($data);
        }





       dd($od);exit;

       $data = array(
           'od'=>$od
       );

       // $pdf = PDF::loadView('backend.odds',$data);
       // return $pdf->stream();

        return view('backend.odds_show')->with($data);
    }

    public function country(){

        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://apifootball.com/api/?action=get_countries&APIkey=f7ff0c4c0538f72b79a3223232ad3d5d38f96bf59bdf745b45762fe06b55d365');

        $data = $res->getBody();
        $country = \GuzzleHttp\json_decode($data);

        foreach ($country as $c):
            $id = $c->country_id;
            $name = $c->country_name;

            $data = array('country_name'=>$name, 'country_id'=>$id);

            //dd($data);exit;
             country::updateOrCreate($data);
        endforeach;

    }

    public function other_country(Request $request){

       // $input = $request->all();

        $id = $request->country_id;
      //  $name = $request->country_name;

        $client = new \GuzzleHttp\Client();
        $today = Carbon::now();
        //$yesturday = Carbon::yesterday();
        $from = Carbon::now()->subDays(4);
        $to   = $today;
        $country_id =$id;
        $res = $client->request('GET', 'https://apifootball.com/api/?action=get_events&from='.$from.'&to='.$to.'&country_id='.$country_id.'&APIkey=f7ff0c4c0538f72b79a3223232ad3d5d38f96bf59bdf745b45762fe06b55d365');
        $data = $res->getBody();
        $event = \GuzzleHttp\json_decode($data);

        $country = country::all();


        //  dd($country); exit;


        //echo $res2->getStatusCode();
        // echo $res->getStatusCode();

        //exit;

        $soccer = array(
            'event'=>$event,
            'country'=>$country,

        );

        // dd($soccer);exit;
        return view('backend.dashboard')->with($soccer);


    }

}
