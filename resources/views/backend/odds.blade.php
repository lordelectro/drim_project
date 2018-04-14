
<h2>Drim Bet Reference</h2>

<table style="width:100%">
    <tr>
        <th>Odd Date</th>
        <th>Match id</th>
        <th>1</th>
        <th>x</th>
        <th>2</th>
    </tr>

    @foreach($ods as $d)
        <tr>
            <td>{{$d->odd_date}}</td>
            <td>{{$d->match_id}}</td>
            <td>{{$d->odd_1}}</td>
            <td>{{$d->odd_x}}</td>
            <td>{{$d->odd_2}}</td>
        </tr>


    @endforeach
</table>