@extends('layouts.app')

@section('title', 'Add Update')

@section('content')
  <h1>Add Update</h1>
  <form method="POST" action="{{ route('updates.store') }}">
    @csrf
    <input name="title" placeholder="Title" required>
    <textarea name="body" placeholder="Body" required></textarea>

    <select name="type" required>
      <option value="update">Update</option>
      <option value="build">Build</option>
      <option value="competition">Competition</option>
    </select>

    <input name="event_name" placeholder="Event name (optional)">
    <input name="position" placeholder="Position/result (optional)">

    <button>Add</button>
  </form>

@endsection