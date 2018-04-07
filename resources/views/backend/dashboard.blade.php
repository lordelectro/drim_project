@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>{{ __('strings.backend.dashboard.welcome') }} {{ $logged_in_user->name }}!</strong>
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
                            <th scope="col">Match Status</th>




                        </tr>
                        </thead>
                        <tbody>
                        @foreach($event as $ev)

                            <tr>
                                <td>{{$ev->match_date}}</td>
                                <td>{{$ev->match_time}}</td>
                                <td>{{$ev->league_name}}</td>
                                <td><span><a href="#" class="btn btn-warning" role="button">3.3</a></span></td>
                                <td>{{$ev->match_hometeam_name}}</td>
                                <td><span><a href="#" class="btn btn-success" role="button">4</a></span></td>
                                <td>{{$ev->match_awayteam_name}}</td>
                                <td><span><a href="#" class="btn btn-info" role="button">5</a></span></td>
                                <td><span><button class="btn btn-danger">Live</button></span></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>



                </div><!--card-block-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
@endsection
