@extends('layouts.app')
@section('title','Updates')
@section('content')
  @if(session()->has('admin_id'))
    <div class="admin-controls">
      <a href="{{ route('updates.create') }}">Add Update</a>
    </div>
  @endif

  @foreach($updates as $u)
    <h3>{{ $u->title }}</h3>
    <p>{{ $u->body }}</p>

    @if(session()->has('admin_id'))
      <a href="{{ route('updates.edit',$u->id) }}">Edit</a>
    @endif
  @endforeach
@endsection
