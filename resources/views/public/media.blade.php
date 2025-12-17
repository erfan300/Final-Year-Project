@extends('layouts.app')
@section('title','Media')
@section('content')
  @if(session()->has('admin_id'))
    <a href="{{ route('media.create') }}">Add Media</a>
  @endif

  @foreach($media as $item)
    <img src="{{ asset('storage/'.$item->file_path) }}" width="200">
  @endforeach
@endsection
