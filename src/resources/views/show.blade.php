@extends('layouts.app')

@section('content')
<h2>{{ $user->name }}さんのプロフィール</h2>

@auth
@if(auth()->user()->follows->contains($user))
<form action="{{ route('users.unfollow', $user->id) }}" method="POST">
  @csrf @method('DELETE')
  <button class="btn btn-outline-secondary btn-sm">フォロー解除</button>
</form>
@else
<form action="{{ route('users.follow', $user->id) }}" method="POST">
  @csrf
  <button class="btn btn-primary btn-sm">フォローする</button>
</form>
@endif
@endauth

<h4>投稿一覧</h4>
@forelse($user->tweets as $tweet)
<div class="card my-2">
  <div class="card-body">
    <p class="mb-1">{{ $tweet->content }}</p>
    <small class="text-muted">{{ $tweet->created_at->format('Y/m/d H:i') }}</small>
  </div>
</div>
@empty
<p>投稿はありません。</p>
@endforelse
@endsection