@extends('layouts.app')
@section('title', $post ? 'Edit Media Post' : 'Add Media Post')
@section('content')

<section class="page">
  <section class="hero">
    <div class="hero-inner">
      <div class="hero-badge">Admin</div>
      <h1 class="hero-title">{{ $post ? 'Edit Media Post' : 'Add Media Post' }}</h1>
      <p class="hero-subtitle">Create a gallery post with a title, caption, and multiple images.</p>
    </div>
  </section>

  <div class="section">

    <form method="POST" action="{{ $post ? route('media.update', $post->id) : route('media.store') }}" enctype="multipart/form-data" class="admin-form admin-form-card">
      <!-- CSRF Protection -->
      @csrf
      @if($post) @method('PUT') @endif

      <input name="title" placeholder="Optional title" maxlength="255" value="{{ old('title', $post->title ?? '') }}">
      
      <!-- Uses char-counter which is driven through JS via the use of field id + "-count" -->
      <textarea id="caption" name="caption" placeholder="Optional caption (shown under the post)" maxlength="2000">{{ old('caption', $post->caption ?? '') }}</textarea>
      <small class="char-counter">
        <span id="caption-count">0</span>/2000 characters
      </small>

      <input name="event_name" placeholder="Optional event name" maxlength="255" value="{{ old('event_name', $post->event_name ?? '') }}">

      <label for="date">
        Event Date
        <span class="field-hint">
          {{ $post ? ' — leave blank to keep existing date' : '(Optional)' }}
        </span>
      </label>

      <!-- Client-side bounds (min/max) in addition to server validation enforcement -->
      <input id="date" type="date" name="event_date" value="{{ old('event_date', $post->event_date ?? '') }}" max="{{ now()->toDateString() }}" min="{{ now()->subYears(10)->toDateString() }}">

      @if($post && $post->items->count())
        <div class="media-existing">
          <div class="media-existing-title">Current images (tick to remove)</div>

          <div class="media-grid">
            @foreach($post->items as $item)
              @php
                // Determining whether the file should be rendered as a video based on its extension
                $path = $item->file_path;
                $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
                $isVideo = in_array($ext, ['mp4','webm','ogg','mov']);
              @endphp

              <label class="media-thumb">
                <input type="checkbox" name="remove_items[]" value="{{ $item->id }}">

                @if($isVideo)
                  <video class="media-thumb-video" muted playsinline preload="metadata">
                    <source src="{{ asset('storage/'.$path) }}">
                  </video>
                @else
                  <img src="{{ asset('storage/'.$path) }}" alt="Media image">
                @endif
              </label>
            @endforeach
          </div>
        </div>
      @endif
      
      <label for="media">
        Media Post
        <span class="field-hint">
          {{ $post ? ' — leave blank to keep existing media' : '' }}
        </span>
      </label>

      <!-- Multiple uploads are allowed, and required when creating a new post -->
      <input id="media" type="file" name="files[]" accept="image/*,video/*" multiple {{ $post ? '' : 'required' }}>

      <button type="submit">{{ $post ? 'Save Changes' : 'Create Post' }}</button>
    </form>
  </div>
</section>

@endsection
