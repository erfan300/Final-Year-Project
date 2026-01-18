@extends('layouts.app')
@section('title','Media')
@section('content')

<section class="page">

  <section class="hero">
    <div class="hero-inner">
      <div class="hero-badge">Gallery</div>
      <h1 class="hero-title">Media</h1>
      <p class="hero-subtitle">Photos and moments from the team’s journey.</p>
    </div>
  </section>

  <div class="section">
    @if(session()->has('admin_id'))
      <div class="admin-controls">
        <a href="{{ route('media.create') }}" class="btn btn-small">Add Media</a>
      </div>
    @endif

    <div class="media-grid">
      @foreach($media as $item)
        <img src="{{ asset('storage/'.$item->file_path) }}" alt="Media item">
      @endforeach
    </div>
  </div>

</section>
@endsection
