@extends('layouts.app')
@section('content')
    <form method="POST" action="{{ route('recruitment.submit') }}">
    <h2>Recruitment Form</h2>
        @csrf
        <input name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email Address" required>
        <input name="course" placeholder="Course Title" required>
        <input name="year_of_study" placeholder="Year of study" required>
        <textarea name="message" placeholder="Additional Message"></textarea>
        <button type="submit">Apply</button>
    </form>
@endsection