@extends('layouts.app')
@section('title', $content ? 'Edit Content' : 'Add Content')
@section('content')

<section class="page">

  <section class="hero">
    <div class="hero-inner">
      <div class="hero-badge">Admin</div>
      <h1 class="hero-title">
        {{ $content ? 'Edit Content' : 'Add Content' }}
      </h1>
      <p class="hero-subtitle">
        {{ $content
            ? 'Update the content displayed on the public website.'
            : 'Create new content for a section of the website.' }}
      </p>
    </div>
  </section>

  <div class="section">

    <form
      method="POST"
      action="{{ $content ? route('content.update', $content->id) : route('content.store') }}"
    >
      @csrf
      @if($content)
        @method('PUT')
      @endif

      <input type="hidden" name="section_key" value="{{ $section_key }}">

      <h2>Content</h2>
      <textarea id="content" name="content" rows="12" maxlength="2000" required placeholder="Enter the content for this section...">
        {{ old('content', $content->content ?? '') }}
      </textarea>
      <small class="char-counter">
        <span id="content-count">0</span>/2000 characters
      </small>
      <button type="submit">
        {{ $content ? 'Save Changes' : 'Create Content' }}
      </button>

    </form>

  </div>
</section>

@endsection