@extends('layouts.app')

@section('title', 'Add Sponsor')

@section('content')
  <h1>Add Sponsor</h1>
  <form method="POST" action="{{ route('sponsors.store') }}" enctype="multipart/form-data">
    @csrf
    <input type="url" name="website" placeholder="https://company.com">
    <input type="file" name="logo" required>
    <button>Add sponsor logo</button>
  </form>

  @if(session('success')) <p>{{ session('success') }}</p> @endif
  @error('logo') <p>{{ $message }}</p> @enderror
  @error('website') <p>{{ $message }}</p> @enderror
@endsection