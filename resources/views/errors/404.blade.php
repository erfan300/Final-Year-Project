@extends('layouts.app')
@section('title','Page Not Found')

@section('content')
  <h1>404</h1>
  <p>The page you are looking for does not exist.</p>
  <a href="{{ route('home') }}">Return home</a>
@endsection