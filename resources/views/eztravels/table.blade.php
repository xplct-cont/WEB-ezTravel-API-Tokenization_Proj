<div class="bg-dark">
<div class="table-responsive">
    <table class="table" id="eztravels-table">
        <thead class="bgk">
            <tr>
                <th>Origin</th>
        <th>Destination</th>
        <th>Flight No</th>
        <th>Departure Date</th>
        <th>Arrival Date</th>
        <th>Passenger Name</th>
        <th>Age</th>
        <th>Travel Class</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($eztravels as $eztravel)
            <tr class="bg-dark">
                <td>{{ $eztravel->origin }}</td>
            <td>{{ $eztravel->destination }}</td>
            <td>{{ $eztravel->flight_no }}</td>
            <td>{{ $eztravel->departure_date }}</td>
            <td>{{ $eztravel->arrival_date }}</td>
            <td>{{ $eztravel->passenger_name }}</td>
            <td>{{ $eztravel->age }}</td>
            <td>{{ $eztravel->travel_class }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['eztravels.destroy', $eztravel->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('eztravels.show', [$eztravel->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('eztravels.edit', [$eztravel->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>

<style>
    .bgk{
        background-color: #FF6700;
    }
    th{
        color:white;
    }

    </style>