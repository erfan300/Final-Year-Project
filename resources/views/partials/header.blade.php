<header class="site-header">

  <div class="header-inner">
    <a href="{{ route('home') }}" class="brand">
      <img src="{{ asset('images/university-logo.png') }}" alt="Aston University" class="brand-logo">
    </a>

    <div class="header-admin">
      @if(session()->has('admin_id'))
        <form method="POST" action="{{ route('admin.logout') }}">
          @csrf
          <button type="submit" class="admin-login-btn">Logout</button>
        </form>
      @elseif(!request()->routeIs('admin.login'))
        <a href="{{ route('admin.login') }}" class="admin-login-btn">Admin Login</a>
      @endif
    </div>

  </div>

  <nav class="site-nav">
    <ul class="nav-list">
      @php $current = Route::currentRouteName(); @endphp

      <li><a class="nav-link {{ $current === 'home' ? 'is-active' : '' }}" href="{{ route('home') }}">Home</a></li>
      <li><a class="nav-link {{ $current === 'recruitment' ? 'is-active' : '' }}" href="{{ route('recruitment') }}">Recruitment</a></li>
      <li><a class="nav-link {{ $current === 'sponsors' ? 'is-active' : '' }}" href="{{ route('sponsors') }}">Sponsors</a></li>
      <li><a class="nav-link {{ $current === 'updates' ? 'is-active' : '' }}" href="{{ route('updates') }}">Updates</a></li>
      <li><a class="nav-link {{ $current === 'team' ? 'is-active' : '' }}" href="{{ route('team') }}">Team</a></li>
      <li><a class="nav-link {{ $current === 'specs' ? 'is-active' : '' }}" href="{{ route('specs') }}">Technical Specs</a></li>
      <li><a class="nav-link {{ $current === 'media' ? 'is-active' : '' }}" href="{{ route('media') }}">Media</a></li>
    </ul>
  </nav>

</header>