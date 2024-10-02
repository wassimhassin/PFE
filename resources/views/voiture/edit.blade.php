@extends('layouts.app')

@section('content')
<link href="{{ asset('css/voiture.css') }}" rel="stylesheet" />
<div class="container">
    <h1>Edit Voiture</h1>

    <form method="POST" action="{{ route('voiture.update', $voiture->id) }}">
        @csrf
        @method('PUT')
        <input type="text" name="matricule" value="{{ $voiture->matricule }}" required class="w-full p-2 mb-4 border border-gray-300 rounded">
        <input type="text" name="marque" value="{{ $voiture->marque }}" required class="w-full p-2 mb-4 border border-gray-300 rounded">
        <input type="text" name="nature" value="{{ $voiture->nature }}" required class="w-full p-2 mb-4 border border-gray-300 rounded">
        <button type="submit" class="btn">Update Voiture</button>
    </form>
</div>
@endsection
