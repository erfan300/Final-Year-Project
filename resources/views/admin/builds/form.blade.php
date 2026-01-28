@extends('layouts.app')
@section('title', $build ? 'Edit Build' : 'Add Build')
@section('content')

<section class="page">
  <section class="hero">
    <div class="hero-inner">
      <div class="hero-badge">Admin</div>
      <h1 class="hero-title">{{ $build ? 'Edit Build' : 'Add Build' }}</h1>
      <p class="hero-subtitle">Manage car build details and specifications.</p>
    </div>
  </section>

  <div class="section">

    <form method="POST" action="{{ $build ? route('builds.update', $build->id) : route('builds.store') }}" enctype="multipart/form-data" class="admin-form admin-form-card">
        @csrf
        @if($build) @method('PUT') @endif
        @if($build && $build->image_path)
          <div class="admin-image-block">
            <div class="build-image build-image--small">
              <img src="{{ asset('storage/'.$build->image_path) }}" alt="Current build image">
            </div>
          </div>
        @endif

        <input name="name" placeholder="Build name" maxlength="255"
            value="{{ old('name', $build->name ?? '') }}" required>

        <input type="number" name="year" placeholder="Year" min="2000" max="2100"
            value="{{ old('year', $build->year ?? '') }}" required>

        <input type="file" name="image" {{ $build ? '' : 'required' }}>

        <input type="number" name="top_speed" placeholder="Top Speed" maxlength="255" min="0" max="999" value="{{ old('top_speed', $build->top_speed ?? '') }}" required>

        <input type="number" name="weight" placeholder="Weight" min="0" max="999" value="{{ old('weight', $build->weight ?? '') }}" required>

        <input type="number" name="power" placeholder="Power" maxlength="255" min="0" max="999" value="{{ old('power', $build->power ?? '') }}" required>

        <input name="engine" placeholder="Engine" maxlength="255"
            value="{{ old('engine', $build->engine ?? '') }}" required>

        <input name="chassis" placeholder="Chassis" maxlength="255"
            value="{{ old('chassis', $build->chassis ?? '') }}" required>

        <textarea id="highlights" name="highlights" placeholder="Highlights" maxlength="2000">{{ old('highlights', $build->highlights ?? '') }}</textarea>

        <small class="char-counter">
            <span id="highlights-count">0</span>/2000 characters
        </small>
      <button type="submit">{{ $build ? 'Save Changes' : 'Create Build' }}</button>
    </form>
  </div>
</section>

@endsection
