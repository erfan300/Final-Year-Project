@extends('layouts.app')

@section('title', 'Add Sponsor')

@section('content')

<section class="page">

  <section class="hero">
    <div class="hero-inner">
      <div class="hero-badge">Admin</div>
      <h1 class="hero-title">Add Sponsor</h1>
      <p class="hero-subtitle">
        Upload a sponsor logo and link it to their official website.
      </p>
    </div>
  </section>

  <div class="section">

    <form method="POST" action="{{ route('sponsors.store') }}" enctype="multipart/form-data">
      @csrf

      <label for="website">Sponsor Website</label>
      <input id="website" type="url" name="website" placeholder="https://company.com" maxlength="255" required>

      <label for="logo">Sponsor Logo</label>
      <input id="logo" type="file" name="logo" accept="image/*" required>

      <button type="submit">Add Sponsor</button>
    </form>

  </div>
</section>

@endsection