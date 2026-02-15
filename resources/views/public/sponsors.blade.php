@extends('layouts.app')
@section('title','Sponsors')
@section('content')

<section class="page">

  <section class="hero">
    <div class="hero-inner">
      <div class="hero-badge">Partners</div>
      <h1 class="hero-title">Sponsors</h1>
      <p class="hero-subtitle">We are grateful for the support that powers our vision.</p>
    </div>
  </section>

  <div class="section">
    <div class="sponsor-logos">
      <!-- Rendering each sponsor logo and link -->
      @foreach($sponsors as $sponsor)
        <div class="sponsor-card">

          <!-- Opening sponsor site in a new tab when clicked -->
          <a href="{{ $sponsor->website }}" target="_blank" class="sponsor-link">
            <div class="sponsor-logo">
              <img src="{{ asset('storage/'.$sponsor->logo) }}" alt="Sponsor logo">
            </div>
          </a>

          @if(session()->has('admin_id'))
            <!-- Securing admin only controls -->
            <div class="sponsor-actions">
              <a href="{{ route('sponsors.edit', $sponsor->id) }}" class="admin-login-btn">Edit</a>

              <form method="POST" action="{{ route('sponsors.destroy', $sponsor->id) }}">
                <!-- CSRF protection -->
                @csrf
                @method('DELETE')
                <button type="submit" class="admin-login-btn">Delete</button>
              </form>
            </div>
          @endif
        </div>
      @endforeach
    </div>
    @if(session()->has('admin_id'))
      <div class="admin-controls">
        <a href="{{ route('sponsors.create') }}" class="btn btn-small">Add Sponsor</a>
      </div>
    @endif
  </div>

  <div class="section">
    <form method="POST" action="{{ route('sponsorship.submit') }}">
      <h2>Sponsorship Enquiry</h2>
      <!-- CSRF protection -->
      @csrf
      <input name="company_name" placeholder="Company Name" maxlength="255" required>
      <input name="contact_person" placeholder="Contact Name" maxlength="255" required>
      <input type="email" name="email" placeholder="Email Address" maxlength="255" required>
      <input name="phone" placeholder="Phone Number" required>
      <!-- Uses char-counter which is driven through JS via the use of field id + "-count" -->
      <textarea id="message" name="message" placeholder="Additional Message (Optional)" maxlength="2000"></textarea>
      <small class="char-counter">
        <span id="message-count">0</span>/2000 characters
      </small>
      <button type="submit">Submit Enquiry</button>
    </form>
  </div>

</section>
@endsection