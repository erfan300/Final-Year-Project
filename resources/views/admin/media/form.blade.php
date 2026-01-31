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

      @csrf
      @if($post) @method('PUT') @endif

      <input name="title" placeholder="Optional title" maxlength="255" value="{{ old('title', $post->title ?? '') }}">

      <textarea id="caption" name="caption" placeholder="Optional caption (shown under the post)" maxlength="2000">{{ old('caption', $post->caption ?? '') }}</textarea>
      <small class="char-counter">
        <span id="caption-count">0</span>/2000 characters
      </small>

      <input name="event_name" placeholder="Optional event name" maxlength="255" value="{{ old('event_name', $post->event_name ?? '') }}">

      <input type="date" name="event_date" value="{{ old('event_date', $post->event_date ?? '') }}" max="{{ now()->toDateString() }}" min="{{ now()->subYears(10)->toDateString() }}">

      @if($post && $post->items->count())
        <div class="media-existing">
          <div class="media-existing-title">Current images (tick to remove)</div>

          <div class="media-grid">
            @foreach($post->items as $item)
              <label class="media-thumb">
                <input type="checkbox" name="remove_items[]" value="{{ $item->id }}">
                <img src="{{ asset('storage/'.$item->file_path) }}" alt="Media image">
              </label>
            @endforeach
          </div>
        </div>
      @endif

      <input type="file" name="files[]" accept="image/*,video/*" multiple {{ $post ? '' : 'required' }}>

      <button type="submit">{{ $post ? 'Save Changes' : 'Create Post' }}</button>
    </form>
  </div>
</section>

@endsection
