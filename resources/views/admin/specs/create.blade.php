@extends('layouts.app')

@section('title', 'Add Specification')

@section('content')
  <h1>Add Specification</h1>
  <form method="POST" action="{{ route('specs.store') }}">
    @csrf
    <input name="spec_name" placeholder="Spec name" required>
    <textarea name="spec_value" placeholder="Spec value" required></textarea>
    <button>Add spec</button>
  </form>

  @if(session('success')) <p>{{ session('success') }}</p> @endif
@endsection