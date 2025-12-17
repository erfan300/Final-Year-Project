@extends('layouts.app')
@section('title','FAQ')
@section('content')
  <div>{!! nl2br(e($faq->content ?? '')) !!}</div>

  @if(session()->has('admin_id'))
    <a href="{{ route('content.edit', $faq->id) }}">Edit FAQ</a>
  @endif
@endsection
