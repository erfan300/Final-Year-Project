@extends('layouts.app')
@section('title','Sponsors')
@section('content')
  @if(session()->has('admin_id'))
    <a href="{{ route('sponsors.create') }}">Add Sponsor</a>
  @endif

  @foreach($sponsors as $sponsor)
    <a href="{{ $sponsor->website }}" target="_blank">
      <img src="{{ asset('storage/'.$sponsor->logo) }}" width="120">
    </a>
  @endforeach

  <form method="POST" action="{{ route('sponsorship.submit') }}">
    @csrf
    <input name="company_name" required>
    <input name="contact_name" required>
    <input type="email" name="email" required>
    <input name="phone" required>
    <textarea name="message"></textarea>
    <button type="submit">Submit Enquiry</button>
  </form>

  @if(session('success')) <p>{{ session('success') }}</p> @endif
  @foreach($errors->all() as $error) <p>{{ $error }}</p> @endforeach
@endsection
