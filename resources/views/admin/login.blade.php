@extends('layouts.app')

@section('title', 'Admin Login')

@section('content')
<section class="page">

  <section class="hero">
    <div class="hero-inner">
      <div class="hero-badge">Admin</div>
      <h1 class="hero-title">Admin Login</h1>
      <p class="hero-subtitle">Sign in to manage content across the site.</p>
    </div>
  </section>

  <div class="section">
    <form method="POST" action="{{ route('admin.login.submit') }}" class="admin-form admin-form-card">
      <!-- CSRF protection -->
      @csrf

      <label for="username">Username</label>
      <input id="username" type="text" name="username" placeholder="Username" required>

      <label for="password">Password</label>
      <input id="password" type="password" name="password" placeholder="Password" required>

      <button type="submit" class="admin-login-btn">Login</button>

    </form>
  </div>

</section>

@endsection