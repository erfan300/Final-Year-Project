@extends('layouts.app')
@section('title','Team')
@section('content')

<section class="page">
  <section class="hero">
    <div class="hero-inner">
      <div class="hero-badge">People</div>
      <h1 class="hero-title">Team</h1>
      <p class="hero-subtitle">Meet the students behind the scenes.</p>
    </div>
  </section>

  <div class="section">

    @if(session()->has('admin_id'))
      <!-- Securing admin only controls -->
      <div class="admin-controls">
        <a href="{{ route('team.create') }}" class="btn btn-small">Add Member</a>
      </div>
    @endif

    @if($team->count())
      <div class="team-list">
        @foreach($team as $member)
          <article class="team-row">

            <div class="team-row-photo">
              <!-- Placeholder image used if no photo is selected -->
              <img src="{{ $member->photo ? asset('storage/'.$member->photo) : asset('images/avatar-placeholder.png') }}" alt="{{ $member->name }}">
            </div>

            <div class="team-row-content">
              <div class="team-row-header">
                <h3 class="team-row-name">{{ $member->name }}</h3>
                <div class="team-row-role">{{ $member->role }}</div>
              </div>

              @if($member->bio)
                <p class="team-row-bio">{{ $member->bio }}</p>
              @endif

              @if($member->testimonial)
                <p class="team-row-testimonial">“{{ $member->testimonial }}”</p>
              @endif

              @if(session()->has('admin_id'))
                <div class="team-actions sponsor-actions">
                  <a href="{{ route('team.edit', $member->id) }}" class="admin-login-btn">Edit</a>

                  <form method="POST" action="{{ route('team.destroy', $member->id) }}">
                    <!-- CSRF protection -->
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="admin-login-btn">Delete</button>
                  </form>
                </div>
              @endif
            </div>

          </article>
        @endforeach
      </div>
    @else
      <p class="prose">No team members have been added yet.</p>
    @endif

  </div>
</section>

@endsection