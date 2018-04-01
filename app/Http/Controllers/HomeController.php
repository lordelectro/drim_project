<?php

namespace App\Http\Controllers;

use App\country;
use Carbon\Carbon;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    //

    public function index(){

        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://apifootball.com/api/?action=get_countries&APIkey=f7ff0c4c0538f72b79a3223232ad3d5d38f96bf59bdf745b45762fe06b55d365');

         $data = $res->getBody();
         $country = \GuzzleHttp\json_decode($data);

         foreach ($country as $c):
             $id = $c->country_id;
             $name = $c->country_name;

             $data = array('country_name'=>$name, 'country_id'=>$id);

                // dd($data);exit;
           // country::create($data);
          endforeach;




    }

    public function competition(){
       // $id = 173;
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://apifootball.com/api/?action=get_leagues&country_id=173&APIkey=f7ff0c4c0538f72b79a3223232ad3d5d38f96bf59bdf745b45762fe06b55d365');
        $data = $res->getBody();

        $compete = \GuzzleHttp\json_decode($data);

        dd($compete);

    }

    public function event(){
        $client = new \GuzzleHttp\Client();
        $today = Carbon::now();
        $yesturday = Carbon::yesterday();
        $from = $yesturday;
        $to   = $today;
        $league_id = 128;
        $res = $client->request('GET', 'https://apifootball.com/api/?action=get_events&from='.$from.'&to='.$to.'&league_id='.$league_id.'&APIkey=f7ff0c4c0538f72b79a3223232ad3d5d38f96bf59bdf745b45762fe06b55d365');

        $data = $res->getBody();

        $event = \GuzzleHttp\json_decode($data);
     //  dd($event);exit;

        return view('boilerplate::plugins.demo',compact('event'));
    }


}
