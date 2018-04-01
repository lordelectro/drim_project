@include('boilerplate::load.select2')

@push('js')
<script>
    $(".select2").select2();
</script>
@endpush



<div class="box box-default">
    <table class="table">
        <thead class="thead">
        <tr>
            <th scope="col">Match Date</th>
            <th scope="col">Match Time</th>
            <th scope="col">League Name</th>
            <th scope="col">Home Team</th>
            <th scope="col">Away Team</th>

        </tr>
        </thead>
        <tbody>
    @foreach($event as $ev)

            <tr>

                <td>{{$ev->match_date}}</td>
                <td>{{$ev->match_time}}</td>
                <td>{{$ev->league_name}}</td>
                <td>{{$ev->match_hometeam_name}}</td>
                <td>{{$ev->match_awayteam_name}}</td>


            </tr>
    @endforeach
        </tbody>
    </table>
</div>