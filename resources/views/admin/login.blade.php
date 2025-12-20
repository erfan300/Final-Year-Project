@extends('layouts.app')

@section('title', 'Admin Login')

@section('content')
    <form method="POST" action="{{ route('admin.login.submit') }}">
        <h2>Admin Login</h2>
        @csrf

        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Login</button>

        @error('login')
            <p>{{ $message }}</p>
        @enderror
    </form>
@endsection

