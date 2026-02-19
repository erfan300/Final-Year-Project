@extends('layouts.app')
@section('title','Updates')
@section('content')

@php
  function linkify($text) {
    $escaped = e($text); 
    $linked = preg_replace(
      '~(https?://[^\s<]+)~i',
      '<a href="$1" target="_blank" rel="noopener noreferrer">$1</a>',
      $escaped
    );
    return nl2br($linked);
  }
@endphp

<section class="page">
  <section class="hero">
    <div class="hero-inner">
      <div class="hero-badge">News</div>
      <h1 class="hero-title">Updates</h1>
      <p class="hero-subtitle">Build progress, competition results, and announcements.</p>
    </div>
  </section>

  <div class="section">

    @if(session()->has('admin_id'))
      <div class="admin-controls">
        <a href="{{ route('updates.create') }}" class="btn btn-small">Add Update</a>
      </div>
    @endif

    @if($updates->count())
      <div class="updates-list">
        @foreach($updates as $u)
          <article class="update-item">
            <div class="update-meta">
              Posted {{ $u->created_at->format('d M Y - H:i') }}
              <!-- Edited only displayed if updated after creation -->
              @if($u->updated_at && $u->updated_at->gt($u->created_at))
                • Edited {{ $u->updated_at->format('d M Y - H:i') }}
              @endif
            </div>

            <h3 class="update-title">{{ $u->title }}</h3>

            @if($u->image_path)
              <div class="build-image build-image--small">
                <img src="{{ asset('storage/'.$u->image_path) }}" alt="Update image">
              </div>
            @endif

            <div class="update-body prose">
              <!-- Body displayed safely, keeping line breaks and making URLs within body clickable -->
              {!! linkify($u->body) !!}
            </div>

            @if(session()->has('admin_id'))
              <div class="sponsor-actions">
                <a href="{{ route('updates.edit', $u->id) }}" class="admin-login-btn">Edit</a>

                <form method="POST" action="{{ route('updates.destroy', $u->id) }}">
                  <!-- CSRF protection -->
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="admin-login-btn">Delete</button>
                </form>
              </div>
            @endif
          </article>
        @endforeach
      </div>
    @else
      <p class="prose">No updates have been posted yet.</p>
    @endif

  </div>
</section>

@endsection
