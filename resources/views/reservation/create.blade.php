@extends('layouts.app')

@section('content')
<link href="{{ asset('css/reservation.css') }}" rel="stylesheet" />
<div class="container">
    <h1>Add Reservation</h1>

    <form method="POST" action="{{ route('reservation.store') }}">
        @csrf
        <input type="text" name="username" placeholder="Username" required class="w-full p-2 mb-4 border border-gray-300 rounded">
        <input type="text" name="cin_number" placeholder="CIN Number" required class="w-full p-2 mb-4 border border-gray-300 rounded">
        <input type="text" name="matricule" placeholder="Matricule" required class="w-full p-2 mb-4 border border-gray-300 rounded">
        <input type="date" name="start_date" required class="w-full p-2 mb-4 border border-gray-300 rounded">
        <input type="date" name="end_date" required class="w-full p-2 mb-4 border border-gray-300 rounded">
        <button type="submit" class="btn">Add Reservation</button>
    </form>
</div>
@endsection
