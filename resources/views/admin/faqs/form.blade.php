@extends('layouts.app')
@section('title', $faq ? 'Edit FAQ' : 'Add FAQ')
@section('content')

<section class="page">
  <section class="hero">
    <div class="hero-inner">
      <div class="hero-badge">Admin</div>
      <h1 class="hero-title">{{ $faq ? 'Edit FAQ' : 'Add FAQ' }}</h1>
      <p class="hero-subtitle">Create structured questions and answers.</p>
    </div>
  </section>

  <div class="section">
    <form method="POST" action="{{ $faq ? route('faqs.update', $faq->id) : route('faqs.store') }}">
      <!-- CSRF protection -->
      @csrf
      @if($faq) @method('PUT') @endif

      <input name="question" placeholder="Question" maxlength="255" value="{{ old('question', $faq->question ?? '') }}" required>

      <!-- Uses char-counter which is driven through JS via the use of field id + "-count" -->
      <textarea id="answer" name="answer" placeholder="Answer" maxlength="2000" required>{{ old('answer', $faq->answer ?? '') }}</textarea>
      
      <small class="char-counter">
        <span id="answer-count">0</span>/2000 characters
      </small>

      <label for="sort">
        Sort Number
        <span class="field-hint">
          {{ $faq ? ' — leave blank to keep existing order' : '(Optional)' }}
        </span>
      </label>

      <input id="sort" type="number" name="sort_order" placeholder="Order (optional)" value="{{ old('sort_order', $faq->sort_order ?? 0) }}" min="0">

      <button type="submit">{{ $faq ? 'Save Changes' : 'Create FAQ' }}</button>
    </form>
  </div>
</section>

@endsection
