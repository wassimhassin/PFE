@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Register</h1>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
    @csrf
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required>
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
    </div>
    <div>
        <label for="cin_number">CIN Number</label>
        <input type="text" name="cin_number" id="cin_number" required>
    </div>
    <div>
        <label for="phone_number">Phone Number</label>
        <input type="text" name="phone_number" id="phone_number" required>
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
    </div>
    <div>
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required>
    </div>
    <button type="submit">Register</button>
</form>

    <a href="{{ route('login') }}">Already have an account? Login</a>
</div>
@endsection
