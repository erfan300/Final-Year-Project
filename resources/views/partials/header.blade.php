<header>

  <div style="display:flex; justify-content:space-between; align-items:center;">
    
    <div>
      <a href="{{ route('home') }}">
        <img src="{{ asset('images/university-logo.png') }}" alt="University Logo" height="60">
      </a>
    </div>

    <div>
      @if(session()->has('admin_id'))
        <form method="POST" action="{{ route('admin.logout') }}">
          @csrf
          <button type="submit">Logout</button>
        </form>
      @else
        <a href="{{ route('admin.login') }}">Admin Login</a>
      @endif
    </div>

  </div>

  {{-- Navigation bar --}}
  <nav>
    <ul style="display:flex; gap:20px; list-style:none; padding:0;">
      
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

      @if($current !== 'faq')
        <li><a href="{{ route('faq') }}">FAQ</a></li>
      @endif

    </ul>
  </nav>

</header>