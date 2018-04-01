@include('boilerplate::load.select2')

@push('js')
<script>
    $(".select2").select2();
</script>
@endpush


<div class="box box-default">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Print Receipt <i class="fa fa-print"></i>
        </button>
        </div>



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



            </tr>
    @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>