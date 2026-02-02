@extends('layouts.app')
@section('title', $profile ? 'Edit Team Member' : 'Add Team Member')

@section('content')
<section class="page">
  <section class="hero">
    <div class="hero-inner">
      <div class="hero-badge">Admin</div>
      <h1 class="hero-title">{{ $profile ? 'Edit Team Member' : 'Add Team Member' }}</h1>
      <p class="hero-subtitle">Manage team profiles.</p>
    </div>
  </section>

  <div class="section">
    <form method="POST" action="{{ $profile ? route('team.update', $profile->id) : route('team.store') }}" enctype="multipart/form-data" class="admin-form admin-form-card">
      @csrf
      @if($profile) @method('PUT') @endif

      @if($profile && $profile->photo)
        <div class="build-image build-image--small">
          <img src="{{ asset('storage/'.$profile->photo) }}" alt="Team photo">
        </div>
      @endif

      <input name="name" placeholder="Name" value="{{ old('name', $profile->name ?? '') }}" maxlength="255" required>
      <input name="role" placeholder="Role" value="{{ old('role', $profile->role ?? '') }}" maxlength="255" required>

      <textarea id="bio" name="bio" placeholder="Optional short bio" maxlength="500">{{ old('bio', $profile->bio ?? '') }}</textarea>
      <small class="char-counter">
        <span id="bio-count">0</span>/500 characters
      </small>

      <textarea id="testimonial" name="testimonial" placeholder="Optional testimonial / quote" maxlength="1000">{{ old('testimonial', $profile->testimonial ?? '') }}</textarea>
      <small class="char-counter">
        <span id="testimonial-count">0</span>/1000 characters
      </small>

      <input type="file" name="photo" accept="image/*" @if(!$profile) required @endif>

      <button type="submit">
        {{ $profile ? 'Save Changes' : 'Add Member' }}
      </button>
    </form>
  </div>
</section>
@endsection
