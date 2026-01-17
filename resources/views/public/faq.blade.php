@extends('layouts.app')
@section('title','FAQ')
@section('content')
  <div>{!! nl2br(e($faq->content ?? '')) !!}</div>

  @if(session()->has('admin_id'))
    <div class="admin-controls">
      <a href="{{ route('content.edit', $faq->id) }}">Edit FAQ</a>
    </div>
  @endif

  <form method="POST" action="{{ route('contact.submit') }}">
    <h2>Contact Form</h2>
    @csrf
    <input name="name" placeholder="Full Name" required>
    <input type="email" name="email" placeholder="Email Address" required>
    <textarea name="message" placeholder="Message"></textarea>
    <button type="submit">Send</button>
  </form>
@endsection
