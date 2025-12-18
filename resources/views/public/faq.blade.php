@extends('layouts.app')
@section('title','FAQ')
@section('content')
  <div>{!! nl2br(e($faq->content ?? '')) !!}</div>

  @if(session()->has('admin_id'))
    <a href="{{ route('content.edit', $faq->id) }}">Edit FAQ</a>
  @endif

  <form method="POST" action="{{ route('contact.submit') }}">
    @csrf
    <input name="name" required>
    <input type="email" name="email" required>
    <textarea name="message" required></textarea>
    <button type="submit">Send</button>
  </form>

  @if(session('success')) <p>{{ session('success') }}</p> @endif
  @foreach($errors->all() as $error) <p>{{ $error }}</p> @endforeach
@endsection
