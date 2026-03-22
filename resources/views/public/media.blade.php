<!-- Used to detect file extensions -->
@php 
  use Illuminate\Support\Str; 
  use Carbon\Carbon;
@endphp

@extends('layouts.app')
@section('title','Media')
@section('content')

@php
  function linkifyMedia($text) {
    // Escaping text for safety
    $escaped = e($text); 
    // Turning URLs into clickable links
    $linked = preg_replace(
      '~(https?://[^\s<]+)~i',
      '<a href="$1" target="_blank" rel="noopener noreferrer">$1</a>',
      $escaped
    );
    // Keep line breaks
    return nl2br($linked);
  }
@endphp

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
      <!-- Securing admin only controls -->
      <div class="admin-controls">
        <a href="{{ route('media.create') }}" class="btn btn-small">Add Media Post</a>
      </div>
    @endif

    @if($posts->count())
      <div class="media-posts">
        @foreach($posts as $post)
          <article class="media-post">

            <div class="media-meta">
              Posted {{ $post->created_at->format('d M Y - H:i') }}
              @if($post->updated_at && $post->updated_at->gt($post->created_at))
              <!-- Displays Edited only if the post was updated -->
                · Edited {{ $post->updated_at->format('d M Y - H:i') }}
              @endif
              @if($post->event_name)
                · <strong class="media-meta-highlight">{{ $post->event_name }}</strong>
              @endif

              @if($post->event_date)
              <!-- Formatting stored date into a readable format -->
                · <strong class="media-meta-highlight">{{ Carbon::parse($post->event_date)->format('d M Y') }}</strong>
              @endif
            </div>

            @if($post->title)
              <h3 class="media-title">{{ $post->title }}</h3>
            @endif

            <div class="media-grid">
              @foreach($post->items as $img)
                <div class="media-img">
                  <!-- Rendering images and videos differently to address placeholder issue -->
                  @if(Str::endsWith($img->file_path, ['.mp4', '.webm']))
                    <video controls preload="metadata">
                      <source src="{{ asset('storage/'.$img->file_path) }}">
                      Your browser does not support the video tag.
                    </video>
                  @else
                    <img src="{{ asset('storage/'.$img->file_path) }}" alt="Media">
                  @endif
                </div>
              @endforeach
            </div>

            @if($post->caption)
              <p class="prose media-caption">
                <!-- Displaying caption safely, keeping line breaks and making links within captions clickable -->
                {!! linkifyMedia($post->caption) !!}
              </p>
            @endif

            @if(session()->has('admin_id'))
              <div class="sponsor-actions">
                <a href="{{ route('media.edit', $post->id) }}" class="admin-login-btn">Edit</a>

                <form method="POST" action="{{ route('media.destroy', $post->id) }}">
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
      <p class="prose">No media has been added yet.</p>
    @endif
  </div>

</section>
@endsection
