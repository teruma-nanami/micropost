@extends('layouts.app')

@section('content')
<h2 class="mb-4">タイムライン</h2>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
<form method="GET" action="{{ route('home') }}" class="mb-4 d-flex" role="search">
  <input type="text" name="keyword" class="form-control me-2" placeholder="投稿を検索">
  <button type="submit" class="btn btn-outline-primary" style="min-width: 80px;">検索</button>
</form>
@foreach($tweets as $tweet)
<div class="card mb-3">
  <div class="card-body">
    <p>
      <a href="{{ route('users.show', $tweet->user->id) }}">
        {{ $tweet->user->name }} さん
      </a>
    </p>
    <p>{{ $tweet->content }}</p>
    <small class="text-muted">{{ $tweet->created_at->diffForHumans() }}</small>
    @auth
    @if(auth()->user()->likes->contains($tweet))
    <form action="{{ route('tweets.unlike', $tweet->id) }}" method="POST" style="display:inline;">
      @csrf @method('DELETE')
      <button type="submit" class="btn btn-outline-none btn-sm d-inline-flex align-items-center" style="gap: 0.4em;">
        <span style="font-size:1.2em;">❤️</span> <span>取り消す</span>
      </button>
    </form>
    @else
    <form action="{{ route('tweets.like', $tweet->id) }}" method="POST" style="display:inline;">
      @csrf
      <button type="submit" class="btn btn-outline-none btn-sm d-inline-flex align-items-center" style="gap: 0.4em;">
        <span style="font-size:1.2em;">🤍</span> <span>いいね</span>
      </button>
    </form>
    @endif
    <span class="ms-2 text-muted">{{ $tweet->likedByUsers->count() }}件</span>
    {{-- リプライ表示 --}}
    @if($tweet->replies && $tweet->replies->count())
    <div class="ms-4 mt-2 border-start border-3 ps-4 py-2 bg-light rounded-3 shadow-sm">
      <div class="fw-bold text-secondary mb-2" style="font-size:0.98em; letter-spacing:0.05em;">
        <i class="bi bi-chat-left-text me-1"></i>返信
      </div>
      @foreach ($tweet->replies as $reply)
      <div class="reply d-flex align-items-start mb-2 ps-1" style="position:relative;">
        <span style="font-size:1.2em; color:#6c757d; margin-right:0.5em;">↳</span>
        <span class="bg-white px-2 py-1 rounded border flex-fill">{{ $reply->content }}</span>
      </div>
      @endforeach
    </div>
    @endif
    {{-- 返信フォーム --}}
    <form action="{{ route('tweets.store') }}" method="POST" class="mt-2">
      @csrf
      <input type="hidden" name="parent_id" value="{{ $tweet->id }}">
      <textarea name="content" rows="2" class="form-control mb-1" placeholder="返信を入力"></textarea>
      <button type="submit" class="btn btn-secondary btn-sm">返信</button>
    </form>
    @endauth
  </div>
</div>

@endforeach
<div class="d-flex justify-content-center">
  {{ $tweets->links('pagination::bootstrap-4') }}
</div>
@endsection