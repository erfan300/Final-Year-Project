@extends('layouts.app')
@section('title','Team')
@section('content')
  @if(session()->has('admin_id'))
    <div class="admin-controls">
      <a href="{{ route('team.create') }}">Add Member</a>
    </div>
  @endif

  @foreach($team as $member)
    <h4>{{ $member->name }} – {{ $member->role }}</h4>
    <p>{{ $member->bio }}</p>
  @endforeach
@endsection
