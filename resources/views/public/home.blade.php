@extends('layouts.app')
@section('title','Home')
@section('content')
  <p>{{ $intro->content ?? '' }}</p>

  @if(session()->has('admin_id'))
    <div class="admin-controls">
      @if($intro)
        <a href="{{ route('content.edit', $intro->id) }}">Edit</a>
      @else
        <a href="{{ route('content.create', ['section' => 'homepage_intro']) }}">
          Add Content
        </a>
      @endif
    </div>
  @endif
@endsection
