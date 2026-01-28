@extends('layouts.app')
@section('title', $update ? 'Edit Update' : 'Add Update')
@section('content')

<section class="page">
  <section class="hero">
    <div class="hero-inner">
      <div class="hero-badge">Admin</div>
      <h1 class="hero-title">{{ $update ? 'Edit Update' : 'Add Update' }}</h1>
      <p class="hero-subtitle">Post news, progress, or announcements.</p>
    </div>
  </section>

  <div class="section">

    <form method="POST" action="{{ $update ? route('updates.update', $update->id) : route('updates.store') }}" enctype="multipart/form-data" class="admin-form admin-form-card">
      @csrf
      @if($update) @method('PUT') @endif

      @if($update && $update->image_path)
        <div class="admin-image-block">
          <div class="build-image build-image--small">
            <img src="{{ asset('storage/'.$update->image_path) }}" alt="Current update image">
          </div>

          <label class="checkbox-row">
            <input type="checkbox" name="remove_image" value="1">
            <span>Remove current image</span>
          </label>
        </div>
      @endif

      <input name="title" placeholder="Title" maxlength="255" value="{{ old('title', $update->title ?? '') }}" required>

      <textarea id="body" name="body" placeholder="Write your update..." maxlength="2000" required>{{ old('body', $update->body ?? '') }}</textarea>
      <small class="char-counter">
        <span id="body-count">0</span>/2000 characters
      </small>

      <input type="file" name="image" accept="image/*">

      <button type="submit">
        {{ $update ? 'Save Changes' : 'Create Update' }}
      </button>

    </form>

  </div>
</section>
@endsection
