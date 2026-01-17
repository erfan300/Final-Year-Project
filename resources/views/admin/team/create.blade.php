@extends('layouts.app')

@section('title', 'Add Team')

@section('content')
  <h1>Add Team</h1>
  <form method="POST" action="{{ route('team.store') }}">
    @csrf
    <input name="name" placeholder="Name" required>
    <input name="role" placeholder="Role" required>
    <textarea name="bio" placeholder="Bio"></textarea>
    <textarea name="testimonial" placeholder="Testimonial"></textarea>
    <button>Add profile</button>
  </form>
@endsection