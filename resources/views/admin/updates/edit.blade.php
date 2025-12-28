@extends('layouts.app')

@section('title', 'Edit Update')

@section('content')
  <h1>Edit Content</h1>
  <form method="POST" action="{{ route('updates.update', $update->id) }}">
    @csrf
    @method('PUT')
    <input name="title" value="{{ $update->title }}" required>
    <textarea name="body" required>{{ $update->body }}</textarea>

    <select name="type" required>
      <option value="update" @selected($update->type==='update')>Update</option>
      <option value="build" @selected($update->type==='build')>Build</option>
      <option value="competition" @selected($update->type==='competition')>Competition</option>
    </select>

    <input name="event_name" value="{{ $update->event_name }}">
    <input name="position" value="{{ $update->position }}">

    <button>Save</button>
  </form>

  <form method="POST" action="{{ route('updates.destroy', $update->id) }}">
    @csrf
    @method('DELETE')
    <button>Delete</button>
  </form>

  @if(session('success')) <p>{{ session('success') }}</p> @endif
@endsection