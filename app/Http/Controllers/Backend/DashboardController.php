<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use PDF;
use Illuminate\Support\Carbon;

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

        $client = new \GuzzleHttp\Client();
        $today = Carbon::now();
        //$yesturday = Carbon::yesterday();
        $from = Carbon::now()->subDays(1);
        $to   = $today;
        $league_id =63;
        $res = $client->request('GET', 'https://apifootball.com/api/?action=get_events&from='.$from.'&to='.$to.'&league_id='.$league_id.'&APIkey=f7ff0c4c0538f72b79a3223232ad3d5d38f96bf59bdf745b45762fe06b55d365');

        $data = $res->getBody();

        $event = \GuzzleHttp\json_decode($data);

        return view('backend.dashboard',compact('event'));
    }

    public function odds(){

        $today = Carbon::now();
        $from = Carbon::now()->subDays(1);
        $to   = $today;
        $client = new \GuzzleHttp\Client();
        $odd = $client->request('GET', 'https://apifootball.com/api/?action=get_odds&from='.$from.'&to='.$to.'&APIkey=f7ff0c4c0538f72b79a3223232ad3d5d38f96bf59bdf745b45762fe06b55d365');
        $d = $odd->getBody();
        $od = \GuzzleHttp\json_decode($d);

       //dd($od);exit;

       $data = array(
           'od'=>$od
       );

        $pdf = PDF::loadView('backend.odds',$data);
        return $pdf->stream();
    }
}
