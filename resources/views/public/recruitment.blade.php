@extends('layouts.app')
@section('title','Recruitment')
@section('content')

<section class="page">
    <section class="hero">
    <div class="hero-inner">
        <div class="hero-badge">Join Us</div>
        <h1 class="hero-title">Recruitment</h1>
        <p class="hero-subtitle">Apply to be part of Aston Formula Student.</p>
    </div>
    </section>
  <div class="section">
    <form method="POST" action="{{ route('recruitment.submit') }}">
      <h2>Recruitment Form</h2>
      @csrf
      <input name="name" placeholder="Full Name" maxlength="255" required>
      <input type="email" name="email" placeholder="Email Address" maxlength="255" required>
      <input name="course" placeholder="Course Title" maxlength="255" required>
      <select name="year_of_study" required>
        <option value="">Select year of study</option>
        <option value="1">1st Year</option>
        <option value="2">2nd Year</option>
        <option value="3">3rd Year</option>
        <option value="masters">Masters</option>
        <option value="phd">PhD</option>
      </select>
      <textarea id="message" name="message" placeholder="Additional Message" maxlength="2000"></textarea>
      <small class="char-counter">
        <span id="message-count">0</span>/2000 characters
      </small>
      <button type="submit">Apply</button>
    </form>
  </div>
</section>

@endsection