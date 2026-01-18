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
      <div class="admin-controls">
        <a href="{{ route('team.create') }}" class="btn btn-small">Add Member</a>
      </div>
    @endif

    <div class="prose">
      @foreach($team as $member)
        <div class="team-member">
          <h3 class="team-member-title">{{ $member->name }} – {{ $member->role }}</h3>
          <p class="team-member-bio">{{ $member->bio }}</p>
        </div>
      @endforeach
    </div>

  </div>
</section>

@endsection