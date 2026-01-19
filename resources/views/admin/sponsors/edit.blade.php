@extends('layouts.app')

@section('title', 'Edit Sponsor')

@section('content')

<section class="page">
  <section class="hero">
    <div class="hero-inner">
      <div class="hero-badge">Admin</div>
      <h1 class="hero-title">Edit Sponsor</h1>
      <p class="hero-subtitle">Update the sponsor website or replace the logo.</p>
    </div>
  </section>

  <div class="section">

    <div class="sponsor-edit-preview">
      <div class="sponsor-logo">
        <img src="{{ asset('storage/'.$sponsor->logo) }}" alt="Current sponsor logo">
      </div>
    </div>

    <form method="POST" action="{{ route('sponsors.update', $sponsor->id) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <label for="website">Sponsor Website</label>
      <input type="url" name="website" value="{{ $sponsor->website }}" placeholder="https://company.com" required>
      <label for="logo">Sponsor Logo</label>
      <input type="file" name="logo">

      <button type="submit">Save</button>
    </form>

    <form method="POST" action="{{ route('sponsors.destroy', $sponsor->id) }}">
      @csrf
      @method('DELETE')
      <button type="submit">Delete</button>
    </form>

  </div>
</section>

@endsection