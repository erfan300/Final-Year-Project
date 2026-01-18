@extends('layouts.app')
@section('title','Home')
@section('content')

<section class="page">

  <section class="hero">
    <div class="hero-inner">
      <div class="hero-badge">Aston University</div>
      <h1 class="hero-title">Aston Formula Student</h1>
      <p class="hero-subtitle">
        Student-led engineering. Real-world design. Competitive motorsport.
      </p>
    </div>
  </section>

  <section class="section">
    <h2>About Us</h2>

    <div class="prose">
      {!! nl2br(e($intro->content ?? '')) !!}
    </div>

    @if(session()->has('admin_id'))
      <div class="admin-controls">
        <a href="{{ route('content.edit', $intro->id) }}" class="btn btn-small">Edit</a>
      </div>
    @endif
  </section>

</section>
@endsection