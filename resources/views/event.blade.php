@extends('layout.app')

@section('content')
    <style>
        h1{
            text-align: center;
            font-family: Algerian; 
            font-size: 100px;
            padding-top: 1rem;
            padding-bottom: 1rem;
        }
        form{
            display: flex;
            gap: 0.5rem;
            padding-bottom: 1rem;
            font-size: 18px;
            font-family: Garamond;
        }

        
    </style>

    <h1>Event Registration System</h1>
    
    <div>

        <div class="row">
            <form action="{{route('saveEvents')}}" method="post">
                @csrf

                <label for="EventName" class="col"></label>
                <input class="inputs" type="text" name="EventName" placeholder="Event Name">

                <label for="Date" class="col"></label>
                <input class="inputs" type="text" name="Date" placeholder="Date">

                <label for="Location" class="col"></label>
                <input class="inputs" type="text" name="Location" placeholder="Location">

                <label for="Attendees" class="col"></label>
                <input class="inputs" type="text" name="Attendees" placeholder="Attendees">

                <div class="col">
                    <button>Add</button>
                </div>
            </form>
        </div>

        <table class="table table-dark table-striped">

            <thead>
                <tr>
                    <th>Id</th>
                    <th>Event Name</th>
                    <th>Date</th>
                    <th>Location</th>
                    <th>Attendees</th>
                </tr>   
            </thead>
            
            <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>{{ $event->Id }}</td>
                        <td>{{ $event->EventName }}</td>
                        <td>{{ $event->Date }}</td>
                        <td>{{ $event->Location }}</td>
                        <td>{{ $event->Attendees }}</td>
                        <td>
                            <a href="{{route('updateEvents', $event->id)}}">
                                <button>Edit</button>
                            </a>
                        </td>

                        <td>
                            <a href="{{route('removeEvents', $event->id)}}">
                                <button">Delete</button>
                            </a>
                        </td>
                    </tr> 
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

@section('title')
    Event Page
@endsection