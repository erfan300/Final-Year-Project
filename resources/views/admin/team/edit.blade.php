@extends('layouts.app')

@section('title', 'Edit Team')

@section('content')
  <h1>Edit team</h1>
  <form method="POST" action="{{ route('team.update', $profile->id) }}">
    @csrf
    @method('PUT')
    <input name="name" value="{{ $profile->name }}" required>
    <input name="role" value="{{ $profile->role }}" required>
    <textarea name="bio">{{ $profile->bio }}</textarea>
    <textarea name="testimonial">{{ $profile->testimonial }}</textarea>
    <button>Save</button>
  </form>

  <form method="POST" action="{{ route('team.destroy', $profile->id) }}">
    @csrf
    @method('DELETE')
    <button>Delete</button>
  </form>

  @if(session('success')) <p>{{ session('success') }}</p> @endif
@endsection