@extends('layouts.app')

@section('title', 'Add Media')

@section('content')
  <h1>Add Media</h1>
  <form method="POST" action="{{ route('media.store') }}" enctype="multipart/form-data">
    @csrf
    <input name="title" placeholder="Optional title">
    <input name="event_name" placeholder="Optional event name">
    <input type="date" name="event_date">
    <input type="file" name="file" required>
    <button>Add media</button>
  </form>

  @if(session('success')) <p>{{ session('success') }}</p> @endif
  @error('file') <p>{{ $message }}</p> @enderror
@endsection