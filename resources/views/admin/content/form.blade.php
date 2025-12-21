@extends('layouts.app')
@section('title','Edit Content')
@section('content')
<h1>{{ $content ? 'Edit Content' : 'Add Content' }}</h1>

<form method="POST" action="{{ $content ? route('content.update', $content->id) : route('content.store') }}">
  @csrf
  @if($content) @method('PUT') @endif
  <input type="hidden" name="section_key" value="{{ $section_key }}">
  <textarea name="content" required>{{ old('content', $content->content ?? '') }}</textarea>
  <button type="submit">Save</button>
</form>
@endsection