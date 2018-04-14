@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>Fixture for Matches</strong>
                </div><!--card-header-->
                <div class="card-block">

                    <a href="{{ route('admin.print_odd') }}" class="btn btn-primary"> <i class="fa fa-print"></i> Print Fixture </a>
                    <table class="table">
                        <tr>
                            <th>Odd Date</th>
                            <th>Home Team</th>
                            <th>Visiting Team</th>
                            <th>1</th>
                            <th>x</th>
                            <th>2</th>
                        </tr>

                        @foreach($ods as $d)
                            <tr>
                                <td>{{$d->odd_date}}</td>
                                <td>{{$d->match_hometeam_name}}</td>
                                <td>{{$d->match_awayteam_name}}</td>
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
