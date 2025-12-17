@extends('layouts.app')
@section('title','Home')
@section('content')
  <p>{{ $intro->content ?? '' }}</p>

  @if(session()->has('admin_id'))
    <a href="{{ route('content.edit', $intro->id) }}">Edit</a>
  @endif
@endsection
