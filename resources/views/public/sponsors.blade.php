@extends('layouts.app')
@section('title','Sponsors')
@section('content')
  @if(session()->has('admin_id'))
    <a href="{{ route('sponsors.create') }}">Add Sponsor</a>
  @endif

  @foreach($sponsors as $sponsor)
    <a href="{{ $sponsor->website }}" target="_blank">
      <img src="{{ asset('storage/'.$sponsor->logo) }}" width="120">
    </a>
  @endforeach
@endsection
