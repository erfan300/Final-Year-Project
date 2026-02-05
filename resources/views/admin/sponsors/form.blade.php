@extends('layouts.app')
@section('title', isset($sponsor) ? 'Edit Sponsor' : 'Add Sponsor')
@section('content')

<section class="page">
  <section class="hero">
    <div class="hero-inner">
      <div class="hero-badge">Admin</div>

      <h1 class="hero-title">
        {{ isset($sponsor) ? 'Edit Sponsor' : 'Add Sponsor' }}
      </h1>

      <p class="hero-subtitle">
        {{ isset($sponsor)
            ? 'Update the sponsor website or replace the logo.'
            : 'Upload a sponsor logo and link it to their official website.' }}
      </p>
    </div>
  </section>

  <div class="section">
    @if(isset($sponsor))
      <div class="sponsor-edit-preview">
        <div class="sponsor-logo">
          <img src="{{ asset('storage/'.$sponsor->logo) }}" alt="Current sponsor logo">
        </div>
      </div>
    @endif

    <form method="POST" action="{{ isset($sponsor) ? route('sponsors.update', $sponsor->id) : route('sponsors.store') }}" enctype="multipart/form-data">
      @csrf
      @if(isset($sponsor))
        @method('PUT')
      @endif

      <label for="website">Sponsor Website</label>
      <input id="website" type="url" name="website" placeholder="https://company.com" maxlength="255" value="{{ old('website', $sponsor->website ?? '') }}" required>

      <label for="logo">
        Sponsor Logo
        @if(isset($sponsor))
          <small>(Leave blank to keep current logo)</small>
        @endif
      </label>

      <input id="logo" type="file" name="logo" accept="image/*" {{ isset($sponsor) ? '' : 'required' }}>

      <button type="submit">
        {{ isset($sponsor) ? 'Save Changes' : 'Add Sponsor' }}
      </button>
    </form>
  </div>
</section>

@endsection