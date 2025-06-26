@extends('layouts.app')

@section('content')
<h2 class="mb-4">投稿の編集</h2>

@if($errors->any())
<div class="alert alert-danger">
  <ul class="mb-0">
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<form method="POST" action="{{ route('tweets.update', $tweet) }}">
  @csrf
  @method('PUT')

  <div class="form-group mb-3">
    <textarea name="content" class="form-control" rows="4">{{ old('content', $tweet->content) }}</textarea>
  </div>

  <button type="submit" class="btn btn-primary">更新する</button>
  <a href="{{ route('home') }}" class="btn btn-secondary">キャンセル</a>
</form>
@endsection