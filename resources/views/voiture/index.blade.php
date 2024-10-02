@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/voiture.css') }}">
<div class="container">
    <h1>Voitures</h1>
    <a href="{{ route('voiture.create') }}" class="btn">Add Voiture</a>
    
    <table>
        <thead>
            <tr>
                <th>Matricule</th>
                <th>Marque</th>
                <th>Nature</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($voitures as $voiture)
            <tr>
                <td>{{ $voiture->matricule }}</td>
                <td>{{ $voiture->marque }}</td>
                <td>{{ $voiture->nature }}</td>
                <td>
                    <a href="{{ route('voiture.edit', $voiture->id) }}" class="btn">Edit</a>
                    <form action="{{ route('voiture.destroy', $voiture->id) }}" method="POST" class="inline">
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
