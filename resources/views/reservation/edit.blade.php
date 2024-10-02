@extends('layouts.app')

@section('content')
<link href="{{ asset('css/reservation.css') }}" rel="stylesheet" />
<div class="container">
    <h1>Edit Reservation</h1>

    <form method="POST" action="{{ route('reservation.update', $reservation->id) }}">
        @csrf
        @method('PUT')
        <input type="text" name="username" value="{{ $reservation->username }}" required class="w-full p-2 mb-4 border border-gray-300 rounded">
        <input type="text" name="cin_number" value="{{ $reservation->cin_number }}" required class="w-full p-2 mb-4 border border-gray-300 rounded">
        <input type="text" name="matricule" value="{{ $reservation->matricule }}" required class="w-full p-2 mb-4 border border-gray-300 rounded">
        <input type="date" name="start_date" value="{{ $reservation->start_date }}" required class="w-full p-2 mb-4 border border-gray-300 rounded">
        <input type="date" name="end_date" value="{{ $reservation->end_date }}" required class="w-full p-2 mb-4 border border-gray-300 rounded">
        <button type="submit" class="btn">Update Reservation</button>
    </form>
</div>
@endsection
