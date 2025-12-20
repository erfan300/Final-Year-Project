@extends('layouts.app')
@section('title','Media')
@section('content')
  @if(session()->has('admin_id'))
    <div class="admin-controls">
      <a href="{{ route('media.create') }}">Add Media</a>
    </div>
  @endif

  @foreach($media as $item)
    <div class="media-grid">
      <img src="{{ asset('storage/'.$item->file_path) }}" width="200">
    </div>
  @endforeach
@endsection
