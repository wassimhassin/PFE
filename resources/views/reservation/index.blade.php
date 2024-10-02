@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/reservation.css') }}">
<div class="container">
    <h1>Reservations</h1>
    <a href="{{ route('reservation.create') }}" class="btn">Add Reservation</a>
    
    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>CIN Number</th>
                <th>Matricule</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
            <tr>
                <td>{{ $reservation->username }}</td>
                <td>{{ $reservation->cin_number }}</td>
                <td>{{ $reservation->matricule }}</td>
                <td>{{ $reservation->start_date }}</td>
                <td>{{ $reservation->end_date }}</td>
                <td>
                    <a href="{{ route('reservation.edit', $reservation->id) }}" class="btn">Edit</a>
                    <form action="{{ route('reservation.destroy', $reservation->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
