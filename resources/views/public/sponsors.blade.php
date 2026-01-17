@extends('layouts.app')
@section('title','Sponsors')
@section('content')
  @if(session()->has('admin_id'))
    <div class="admin-controls">
      <a href="{{ route('sponsors.create') }}">Add Sponsor</a>
    </div>
  @endif

  <div class="sponsor-logos">
    @foreach($sponsors as $sponsor)
      <div class="sponsor-card">
        <a href="{{ $sponsor->website }}" target="_blank">
          <img src="{{ asset('storage/'.$sponsor->logo) }}" alt="Sponsor logo">
        </a>

        @if(session()->has('admin_id'))
          <div class="sponsor-actions">
            <a href="{{ route('sponsors.edit', $sponsor->id) }}" class="admin-login-btn">Edit</a>

            <form method="POST" action="{{ route('sponsors.destroy', $sponsor->id) }}">
              @csrf
              @method('DELETE')
              <button type="submit" class="admin-login-btn">Delete</button>
            </form>
          </div>
        @endif
      </div>
    @endforeach
  </div>

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
@endsection
