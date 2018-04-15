@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">

            <div class="container">
                <form class="form-inline" method="POST" action="{{ route('admin.games') }}">

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
                                <select class="form-control" id="sel1">
                                    <option value="1">Match Result(1X2)</option>
                                    <option value="2">Double Chance</option>
                                    <option value="3">Overs/Unders</option>
                                    <option value="4">Both Teams To Score</option>
                                    <option value="5">Odd/Even</option>
                                    <option value="6">Match Result(1X2) -10 Min Interval</option>
                                    <option value="7">First Team To Scoring</option>
                                    <option value="8">Highest Scoring Half</option>
                                </select>
                            </div>

                        <button type="submit" class="btn btn-success">Update</button>

                         <button type="submit" class="btn pull-left" >Place Bet</button>

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
                            <th scope="col">ODDS</th>
                            <th scope="col">Home Team</th>
                            <th scope="col">ODDS</th>
                            <th scope="col">Away Team</th>
                            <th scope="col">Draw</th>

                        </tr>
                        </thead>
                        <tbody>

                        @if(!empty($match))
                            @foreach($match as $ev)

                                <tr>
                                    <td>{{$ev->match_date}}</td>
                                    <td>{{$ev->match_time}}</td>
                                    <td>{{$ev->league_name}}</td>
                                    <td><span><a href="#" class="btn btn-warning" role="button">{{$ev->odd_1}}</a></span></td>
                                    <td>{{$ev->match_hometeam_name}}</td>
                                    <td><span><a href="#" class="btn btn-success" role="button">{{$ev->odd_2}}</a></span></td>
                                    <td>{{$ev->match_awayteam_name}}</td>
                                    <td><span><a href="#" class="btn btn-info" role="button">{{$ev->odd_x}}</a></span></td>

                                </tr>
                            @endforeach
                        @else
                            no matches in this league
                        @endif

                        </tbody>
                    </table>



                </div><!--card-block-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->


@endsection
