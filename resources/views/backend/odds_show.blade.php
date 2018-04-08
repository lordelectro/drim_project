@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>English Premier League</strong>
                </div><!--card-header-->
                <div class="card-block">
                    <table class="table">
                        <tr>
                            <th>Odd Date</th>
                            <th>Match id</th>
                            <th>1</th>
                            <th>x</th>
                            <th>2</th>
                        </tr>

                        @foreach($od as $d)
                            <tr>
                                <td>{{$d->odd_date}}</td>
                                <td>{{$d->match_id}}</td>
                                <td>{{$d->odd_1}}</td>
                                <td>{{$d->odd_x}}</td>
                                <td>{{$d->odd_2}}</td>
                            </tr>


                        @endforeach
                    </table>



                </div><!--card-block-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->

@endsection
