@extends('layouts.app')
@section('title','FAQ')
@section('content')

<section class="page">

  <section class="hero">
    <div class="hero-inner">
      <div class="hero-badge">Support</div>
      <h1 class="hero-title">FAQ</h1>
      <p class="hero-subtitle">Answers to common questions, plus a quick way to contact us.</p>
    </div>
  </section>

  <div class="section">
    @if(session()->has('admin_id'))
    <!-- Securing admin only controls -->
      <div class="admin-controls">
        <a href="{{ route('faqs.create') }}" class="btn btn-small">Add FAQ</a>
      </div>
    @endif

    @if(isset($faqs) && $faqs->count())
      <div class="faq-list">
        @foreach($faqs as $item)
          <div class="faq-item">
            <h3 class="faq-q">{{ $item->question }}</h3>
            <!-- Ensuring answer is displayed safely and keeping line breaks  -->
            <div class="faq-a prose">{!! nl2br(e($item->answer)) !!}</div>

           @if(session()->has('admin_id'))
            <div class="faq-actions">
              <a href="{{ route('faqs.edit', $item->id) }}" class="admin-login-btn">Edit</a>

              <form method="POST" action="{{ route('faqs.destroy', $item->id) }}">
                <!-- CSRF protection -->
                @csrf
                <!-- Communicating with laravel this form should delete the given record -->
                @method('DELETE')
                <button type="submit" class="admin-login-btn">Delete</button>
              </form>
            </div>
          @endif
          
          </div>
        @endforeach
      </div>
    @else
      <p class="prose">No FAQs have been added yet.</p>
    @endif
  </div>

  <div class="section">
    <form method="POST" action="{{ route('contact.submit') }}">
      <h2>Contact Form</h2>
      @csrf
      <input name="name" placeholder="Full Name" maxlength="255" required>
      <input type="email" name="email" placeholder="Email Address" maxlength="255" required>

      <!-- Uses char-counter which is driven through JS via the use of field id + "-count" -->
      <textarea id="message" name="message" placeholder="Message" maxlength="2000" required></textarea>
      <small class="char-counter">
        <span id="message-count">0</span>/2000 characters
      </small>

      <button type="submit">Send</button>
    </form>
  </div>

</section>
@endsection