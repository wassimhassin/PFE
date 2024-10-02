@extends('layouts.app')

@section('content')
<link href="{{ asset('css/voiture.css') }}" rel="stylesheet" />
<div class="container">
    <h1>Add Voiture</h1>

    <form method="POST" action="{{ route('voiture.store') }}">
        @csrf
        <input type="text" name="matricule" placeholder="Matricule" required class="w-full p-2 mb-4 border border-gray-300 rounded">
        <input type="text" name="marque" placeholder="Marque" required class="w-full p-2 mb-4 border border-gray-300 rounded">
        <input type="text" name="nature" placeholder="Nature" required class="w-full p-2 mb-4 border border-gray-300 rounded">
        <button type="submit" class="btn">Add Voiture</button>
    </form>
</div>
@endsection
