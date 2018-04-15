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
                    <table class="table responsive">

                        <tr>
                            <th>Odd Date</th>
                            <th>Home Team</th>
                            <th>Visiting Team</th>
                            <th>1</th>
                            <th>x</th>
                            <th>2</th>
                            <th>1x</th>
                            <th>12</th>
                            <th>x2</th>
                            <th>o+0.5</th>
                            <th>u+0.5</th>
                            <th>o+1</th>
                            <th>u+1</th>
                            <th>o+1.5</th>
                            <th>u+1.5</th>
                            <th>o+2</th>
                            <th>u+2</th>
                            <th>o+2.5</th>
                            <th>u+2.5</th>
                            <th>o+3</th>
                            <th>u+3</th>
                            <th>o+3.5</th>
                            <th>u+3.5</th>
                            <th>o+4</th>
                            <th>u+4</th>
                            <th>o+4.5</th>
                            <th>u+4.5</th>
                            <th>o+5</th>
                            <th>u+5</th>
                            <th>o+5.5</th>
                            <th>u+5.5</th>
                        </tr>


                        @foreach($ods as $d)
                            <tr>
                                <td>{{$d->odd_date}}</td>
                                <td>{{$d->match_hometeam_name}}</td>
                                <td>{{$d->match_awayteam_name}}</td>
                                <td>{{$d->odd_1}}</td>
                                <td>{{$d->odd_x}}</td>
                                <td>{{$d->odd_2}}</td>
                                <td>{{$d->odd_1x}}</td>
                                <td>{{$d->odd_12}}</td>
                                <td>{{$d->odd_x2}}</td>
                                <td>{{$d->{'o+0_5'} }}</td>
                                <td>{{$d->{'u+0_5'} }}</td>
                                <td>{{$d->{'o+1'} }}</td>
                                <td>{{$d->{'u+1'} }}</td>
                                <td>{{$d->{'o+1_5'} }}</td>
                                <td>{{$d->{'u+1_5'} }}</td>
                                <td>{{$d->{'o+2'} }}
                                <td>{{$d->{'u+2'} }}</td>
                                <td>{{$d->{'o+2_5'} }}</td>
                                <td>{{$d->{'u+2_5'} }}</td>
                                <td>{{$d->{'o+3'} }}</td>
                                <td>{{$d->{'o+3_5'} }}</td>
                                <td>{{$d->{'o+4'} }}</td>
                                <td>{{$d->{'u+4'} }}</td>
                                <td>{{$d->{'o+4_5'} }}</td>
                                <td>{{$d->{'u+4_5'} }}</td>
                                <td>{{$d->{'o+5'} }}</td>
                                <td>{{$d->{'u+5'} }}</td>
                                <td>{{$d->{'o+5_5'} }}</td>
                                <td>{{$d->{'u+5_5'} }}</td>
                            </tr>

                        @endforeach
                    </table>

                </div><!--card-block-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->

@endsection
