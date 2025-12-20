@extends('layouts.app')
@section('title','Technical Specs')
@section('content')
  @if(session()->has('admin_id'))
    <div class="admin-controls">
      <a href="{{ route('specs.create') }}">Add Spec</a>
    </div>
  @endif

  <ul>
    @foreach($specs as $spec)
      <li><strong>{{ $spec->spec_name }}:</strong> {{ $spec->spec_value }}</li>
    @endforeach
  </ul>
@endsection
