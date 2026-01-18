@extends('layouts.app')
@section('title','FAQ')
@section('content')

<section class="page">

  <section class="hero">
    <div class="hero-inner">
      <div class="hero-badge">Support</div>
      <h1 class="hero-title">FAQ</h1>
      <p class="hero-subtitle">Answers to common questions, plus a quick way to contact us.</p>
    </div>
  </section>

  <div class="section">
    <div class="prose">
      {!! nl2br(e($faq->content ?? '')) !!}
    </div>

    @if(session()->has('admin_id') && $faq)
      <div class="admin-controls">
        <a href="{{ route('content.edit', $faq->id) }}" class="btn btn-small">Edit FAQ</a>
      </div>
    @endif
  </div>

  <div class="section">
    <form method="POST" action="{{ route('contact.submit') }}">
      <h2>Contact Form</h2>
      @csrf
      <input name="name" placeholder="Full Name" required>
      <input type="email" name="email" placeholder="Email Address" required>
      <textarea name="message" placeholder="Message"></textarea>
      <button type="submit">Send</button>
    </form>
  </div>

</section>
@endsection