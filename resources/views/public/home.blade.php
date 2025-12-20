@extends('layouts.app')
@section('title','Home')
@section('content')
  <p>{{ $intro->content ?? '' }}</p>

  @if(session()->has('admin_id'))
    <div class="admin-controls">
      <a href="{{ route('content.edit', $intro->id) }}">Edit</a>
    </div>
  @endif
@endsection
