<footer class="site-footer">
  <div class="footer-inner">

    <div>
      <div class="footer-title">Aston Formula Student</div>

      <!-- When on FAQ page - the FAQ link at footer should not be present (redundancy) -->
      @if(Route::currentRouteName() !== 'faq')
        <ul class="footer-links">
          <li><a href="{{ route('faq') }}">Frequently Asked Questions</a></li>
        </ul>
      @endif

      <p class="footer-text">
        Student-led engineering. Real-world design. Competitive motorsport.
      </p>
    </div>

    <div>
      <div class="footer-title">University Contact</div>
      <ul class="footer-list">
        <li>Address: Aston St, Birmingham B4 7ET</li>
        <li>Email: formulastudent@aston.ac.uk</li>
        <li>Phone: 0121 204 3000</li>
      </ul>
    </div>

    <div>
      <div class="footer-title">Follow</div>

      <div class="footer-social">
        <a class="social-link" href="https://www.facebook.com/p/Aston-formula-Student-100068996126097/" target="_blank" rel="noopener">
          <img class="social-icon" src="{{ asset('images/facebook.png') }}" alt="Facebook">
        </a>

        <a class="social-link" href="https://www.instagram.com/astonuniracing/" target="_blank" rel="noopener">
          <img class="social-icon" src="{{ asset('images/instagram.png') }}" alt="Instagram">
        </a>

        <a class="social-link" href="https://x.com/AstonUniRacing" target="_blank" rel="noopener">
          <img class="social-icon" src="{{ asset('images/twitter.png') }}" alt="Twitter/X">
        </a>

        <a class="social-link" href="https://www.linkedin.com/company/aston-racing/?originalSubdomain=uk" target="_blank" rel="noopener">
          <img class="social-icon" src="{{ asset('images/linkedin.png') }}" alt="LinkedIn">
        </a>
      </div>
    </div>

  </div>

  <div class="footer-bottom">
    <span>© {{ date('Y') }} Aston Formula Student</span>
    <span class="footer-dot">•</span>
    <span>Aston University</span>
  </div>
</footer>
