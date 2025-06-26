@extends('layouts.app')

@section('content')
    <h2 class="mb-4">新しい投稿</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('tweets.store') }}">
        @csrf
        <div class="form-group mb-3">
            <textarea name="content" class="form-control" rows="4" placeholder="いまどうしてる？">{{ old('content') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">投稿する</button>
    </form>
@endsection