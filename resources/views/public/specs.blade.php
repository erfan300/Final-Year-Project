@extends('layouts.app')
@section('title','Technical Specs')
@section('content')

<section class="page">
  <section class="hero">
    <div class="hero-inner">
      <div class="hero-badge">Build</div>
      <h1 class="hero-title">Technical Specs</h1>
      <p class="hero-subtitle">Key specifications and engineering highlights.</p>
    </div>
  </section>

  <div class="section">
    @if(session()->has('admin_id'))
      <div class="admin-controls">
        <a href="{{ route('specs.create') }}" class="btn btn-small">Add Spec</a>
      </div>
    @endif

    <div class="prose">
      <ul class="spec-list">
        @foreach($specs as $spec)
          <li class="spec-item">
            <strong>{{ $spec->spec_name }}:</strong> {{ $spec->spec_value }}
          </li>
        @endforeach
      </ul>
    </div>
  </div>
</section>

@endsection