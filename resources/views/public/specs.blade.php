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
      <!-- Securing admin only controls -->
      <div class="admin-controls">
        <a href="{{ route('builds.create') }}" class="btn btn-small">Add Build</a>
      </div>
    @endif

    <!-- Builds rendered if the data exists -->
    @if(isset($builds) && $builds->count())
      <div class="build-list">
        @foreach($builds as $build)
          <div class="build-card">

            @if($build->image_path)
              <div class="build-image build-image--small">
                <img src="{{ asset('storage/'.$build->image_path) }}" alt="Car build image">
              </div>
            @endif

            <h2 class="build-title">{{ $build->name }} ({{ $build->year }})</h2>

            @if($build->highlights)
              <p class="prose">{{ $build->highlights }}</p>
            @endif

            <div class="build-grid">
              <div class="build-spec"><strong>Top Speed (mph):</strong> {{ $build->top_speed }}</div>
              <div class="build-spec"><strong>Weight (kg):</strong> {{ $build->weight }}</div>
              <div class="build-spec"><strong>Power (kW):</strong> {{ $build->power }}</div>
              <div class="build-spec"><strong>Engine:</strong> {{ $build->engine }}</div>
              <div class="build-spec"><strong>Chassis:</strong> {{ $build->chassis }}</div>
            </div>

            @if(session()->has('admin_id'))
              <div class="build-actions">
                <a href="{{ route('builds.edit', $build->id) }}" class="admin-login-btn">Edit</a>

                <form method="POST" action="{{ route('builds.destroy', $build->id) }}">
                  <!-- CSRF protection -->
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="admin-login-btn">Delete</button>
                </form>
              </div>
            @endif

          </div>
        @endforeach
      </div>
    @else
      <p class="prose">No builds have been added yet.</p>
    @endif

  </div>
</section>

@endsection