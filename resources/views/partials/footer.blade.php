<footer style="margin-top:40px; padding:20px; border-top:1px solid #ccc;">

  @if(Route::currentRouteName() !== 'faq')
    <p>
      <a href="{{ route('faq') }}" >Frequently Asked Questions</a>
    </p>
  @endif

  <div>
    <p><strong>University Contact</strong></p>
    <p>Address: Aston St, Birmingham B4 7ET</p>
    <p>Email: hello@aston.ac.uk</p>
    <p>Phone: 0121 204 3000</p>
  </div>

  <div style="margin-top:15px;">
    <a href="https://www.facebook.com/p/Aston-formula-Student-100068996126097/" target="_blank">
      <img src="{{ asset('images/facebook.png') }}" alt="Facebook" height="30">
    </a>

    <a href="https://www.instagram.com/astonuniracing/" target="_blank">
      <img src="{{ asset('images/instagram.png') }}" alt="Instagram" height="30">
    </a>

    <a href="https://x.com/AstonUniRacing" target="_blank">
      <img src="{{ asset('images/twitter.png') }}" alt="Twitter/X" height="30">
    </a>

    <a href="https://www.linkedin.com/company/aston-racing/?originalSubdomain=uk" target="_blank">
      <img src="{{ asset('images/linkedin.png') }}" alt="LinkedIn" height="30">
    </a>
  </div>

</footer>
