@extends('layouts.app')
@section('content')
    <h1>Join the Team</h1>

    <form method="POST" action="{{ route('recruitment.submit') }}">
    @csrf
    <input name="name" required>
    <input type="email" name="email" required>
    <input name="course" required>
    <input name="year_of_study" required>
    <textarea name="message"></textarea>
    <button type="submit">Apply</button>
    </form>
    @if(session('success')) <p>{{ session('success') }}</p> @endif
    @foreach($errors->all() as $error) <p>{{ $error }}</p> @endforeach
@endsection