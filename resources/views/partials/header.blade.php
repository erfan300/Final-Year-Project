<header>

  <div class="top-header">
    
    <div>
      <a href="{{ route('home') }}">
        <img src="{{ asset('images/university-logo.png') }}" alt="University Logo" height="60">
      </a>
    </div>

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

  <nav>
    <ul class="ul-header">
      
      @php
        $current = Route::currentRouteName();
      @endphp

      @if($current !== 'home')
        <li><a href="{{ route('home') }}">Home</a></li>
      @endif

      @if($current !== 'recruitment')
        <li><a href="{{ route('recruitment') }}">Recruitment</a></li>
      @endif

      @if($current !== 'sponsors')
        <li><a href="{{ route('sponsors') }}">Sponsors</a></li>
      @endif

      @if($current !== 'updates')
        <li><a href="{{ route('updates') }}">Updates</a></li>
      @endif

      @if($current !== 'team')
        <li><a href="{{ route('team') }}">Team</a></li>
      @endif

      @if($current !== 'specs')
        <li><a href="{{ route('specs') }}">Technical Specs</a></li>
      @endif

      @if($current !== 'media')
        <li><a href="{{ route('media') }}">Media</a></li>
      @endif
    </ul>
  </nav>

</header>