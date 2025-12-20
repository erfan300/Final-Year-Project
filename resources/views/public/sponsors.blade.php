@extends('layouts.app')
@section('title','Sponsors')
@section('content')
  @if(session()->has('admin_id'))
    <div class="admin-controls">
      <a href="{{ route('sponsors.create') }}">Add Sponsor</a>
    </div>
  @endif

  @foreach($sponsors as $sponsor)
    <div class="sponsor-logos">
      <a href="{{ $sponsor->website }}" target="_blank">
        <img src="{{ asset('storage/'.$sponsor->logo) }}" width="120">
      </a>
    </div>
  @endforeach

  <form method="POST" action="{{ route('sponsorship.submit') }}">
    <h2>Sponsorship Enquiry</h2>
    @csrf
    <input name="company_name" placeholder="Company Name" required>
    <input name="contact_name" placeholder="Contact Name" required>
    <input type="email" name="email" placeholder="Email Address" required>
    <input name="phone" placeholder="Phone Number" required>
    <textarea name="message" placeholder="Additional Message"></textarea>
    <button type="submit">Submit Enquiry</button>
  </form>

  @if(session('success')) <p>{{ session('success') }}</p> @endif
  @foreach($errors->all() as $error) <p>{{ $error }}</p> @endforeach
@endsection
