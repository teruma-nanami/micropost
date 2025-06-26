@extends('layouts.app')

@section('content')
    <h2>{{ $user->name }} さんのマイページ</h2>

    <p class="text-muted">投稿数：{{ $tweets->count() }}</p>

    @foreach($tweets as $tweet)
        <div class="card my-3">
            <div class="card-body">
                <p class="card-text">{{ $tweet->content }}</p>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('tweets.edit', $tweet) }}" class="btn btn-sm btn-outline-primary me-2">編集</a>

                    <form method="POST" action="{{ route('tweets.destroy', $tweet) }}" onsubmit="return confirm('削除しますか？')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger">削除</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection