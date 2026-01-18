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
      <input name="name" placeholder="Full Name" required>
      <input type="email" name="email" placeholder="Email Address" required>
      <input name="course" placeholder="Course Title" required>
      <input name="year_of_study" placeholder="Year of study" required>
      <textarea name="message" placeholder="Additional Message"></textarea>
      <button type="submit">Apply</button>
    </form>
  </div>
</section>

@endsection