@extends('layouts.app')

@section('content')
<h2 class="mb-4">タイムライン</h2>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

@foreach($tweets as $tweet)
<div class="card mb-3">
  <div class="card-body">
    <p>{{ $tweet->user->name }} さん</p>
    <p>{{ $tweet->content }}</p>
    <small class="text-muted">{{ $tweet->created_at->diffForHumans() }}</small>
  </div>
</div>
@endforeach
@endsection