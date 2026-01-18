@extends('layouts.app')
@section('title','Updates')
@section('content')

<section class="page">
  <section class="hero">
    <div class="hero-inner">
      <div class="hero-badge">News</div>
      <h1 class="hero-title">Updates</h1>
      <p class="hero-subtitle">Build progress, competition results, and announcements.</p>
    </div>
  </section>

  <div class="section">

    @if(session()->has('admin_id'))
      <div class="admin-controls">
        <a href="{{ route('updates.create') }}" class="btn btn-small">Add Update</a>
      </div>
    @endif

    <div class="prose">
      @foreach($updates as $u)
        <article class="update-item">
          <h3 class="update-title">{{ $u->title }}</h3>

          <div class="update-body">
            {!! nl2br(e($u->body)) !!}
          </div>

          @if(session()->has('admin_id'))
            <div class="admin-controls">
              <a href="{{ route('updates.edit',$u->id) }}" class="btn btn-small">Edit</a>
            </div>
          @endif
        </article>
      @endforeach
    </div>

  </div>
</section>

@endsection