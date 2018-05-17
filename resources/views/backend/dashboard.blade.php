@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <h6>1X2 Bet</h6>
    <div class="row">

            <div class="container">
                <form class="form-inline" method="POST" action="{{ route('admin.games') }}">
<!--
  <a href="{{ route('admin.betslip') }}" class="btn btn-primary btn-block btn-group clearfix">Betslip <span class="betslip--count slip-counter">0</span></a>
    <a name="more" class="pull-right">&nbsp;</a> -->

                        <div class="form-group">
                            <label for="sel1">Select Country:</label>
                            <select class="form-control" id="sel1" name="country_id">
                                @foreach($country as $c)
                                <option value={{$c->country_id}}>{{$c->country_name}}</option>
                                @endforeach

                            </select>
                        </div>
                          @csrf
                            <div class="form-group">
                                <label for="sel1">Select Bet Type:</label>
                                <select name="bet" class="form-control" id="sel1">
                                    <option value="1">Match Result(1X2)</option>
                                    <option value="2">Double Chance</option>
                                    <option value="3">Over 0.5</option>
                                    <option value="4">Under 0.5</option>
                                    <option value="5">Over 1.5</option>
                                    <option value="6">Under 1.5</option>
                                    <option value="7">Over 2.5</option>
                                    <option value="8">Under 2.5</option>
                                    <option value="9">Over 3.5</option>
                                    <option value="10">Under 3.5</option>
                                    <option value="11">Over 4.5</option>
                                    <option value="12">Under 4.5</option>

                                </select>
                            </div>

                        <button type="submit" class="btn btn-success">Update</button>

                    
                             <a href="{{ route('admin.betslip') }}" class="btn btn-primary btn-block btn-group clearfix">Betslip <span class="betslip--count slip-counter">0</span></a>
                             <a name="more" class="pull-right">&nbsp;</a> 
                        
                     


        </form>
                </div>

    </div>
<br>


    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>Matches to Bet On</strong>
                </div><!--card-header-->
                <div class="card-block">
                    <table class="table">
                        <thead class="thead">
                        <tr>
                            <th scope="col">Match Date</th>
                            <th scope="col">Match Time</th>
                            <th scope="col">League Name</th>    
                            <th scope="col">Home Team</th>
                             <th scope="col">ODDS</th>
                               <th scope="col">Draw</th>

                             <th scope="col">Away Team</th>
                            <th scope="col">ODDS</th>
                          


                        </tr>
                        </thead>
                        <tbody>

                        @if(!empty($match))
                            @foreach($match as $ev)

                               <!-- <tr --> 
                                 <tr  >
                            
<!--starts here-->
                                 <td>{{$ev->match_date}}</td>
                                    <td>{{$ev->match_time}}</td>
                                    <td>{{$ev->league_name}}</td>
                              
                                    <td>{{$ev->match_hometeam_name}}</td>

                                <td id="{{$ev->id}}"  data-sortindex="0" class="btn-sm bettingtd" onclick="SendToBetslip('{{$ev->id}}xHdpSjfNEeiA1AAVXS-e4g', '{{$ev->match_hometeam_name}}', {{$ev->odd_1}}, 'Soccer', 'Match Result (1X2)', 
                                    '{{$ev->match_hometeam_name}} vs {{$ev->match_awayteam_name}}', '{{$ev->match_date}}'
                                , '5e99192a-4d39-1{{$ev->id}}-80d4-00155d2f9ee2');"
                                    >
                                      <span style="height: 100%">
                                        <span class="outcome-price prewrap clearfix">{{$ev->odd_1}}</span>
                                    </span>
                                  

                                </td>

                                   <td id="{{ $ev->id }}" class="btn-sm bettingtd" data-sortindex="1"  onclick="SendToBetslip('{{$ev->id}}xHdpSjfNEeiA1AAVXS-e4g', 'Draw', {{$ev->odd_x}}, 'Soccer', 'Match Result (1X2)', 
                                        '{{$ev->match_hometeam_name}} vs {{$ev->match_awayteam_name}}',
                                         '{{$ev->match_date}}', '5e99192a-4d39-2{{$ev->id}}-80d4-00155d2f9ee2');">

                                             <span style="height: 100%">
                                                 <span class="outcome-price prewrap clearfix">{{$ev->odd_x}}</span>
                                            </span>


                                    </td>


                                 <td>{{$ev->match_awayteam_name}}</td>
                                <td id="{{$ev->id}}xHdpSjfNEeiA1AAVXS-e4g"  class="btn-sm bettingtd" data-sortindex="2" onclick="SendToBetslip('{{$ev->id}}', '{{$ev->match_awayteam_name}}' , {{$ev->odd_2}}, 'Soccer', 'Match Result (1X2)', 
                                    '{{$ev->match_hometeam_name}} vs {{$ev->match_awayteam_name}}', '{{$ev->match_date}}', '5e99192a-4d39-2{{$ev->id}}-80d4-00155d2f9ee2');" >
                                     <span style="height: 100%">
                                                 <span class="outcome-price prewrap clearfix">{{$ev->odd_2}}</span>
                                            </span>


                                </td>

                                   
                                 
<!--Ends here-->
                                </tr>

 
                            @endforeach
                        @else
                            no matches in this league
                        @endif

                        </tbody>
                    </table>
                    {{ $match->links() }}
                </div><!--card-block-->

                               <!-- Modal -->
<div style="visibility: hidden" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
<!--start-->


<!--end-->

      </div>
   
    </div>
  </div>
</div>


            </div><!--card-->
        </div><!--col-->
    </div><!--row-->


@endsection
