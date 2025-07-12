@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 400px;">
  <div class="card shadow">
    <div class="card-body">
      <h2 class="card-title text-center mb-4">会員登録</h2>
      <form action="/register" method="post">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">ユーザー名</label>
          <input type="text" name="name" id="name" class="form-control" placeholder="Username" value="{{ old('name') }}" required autofocus>
          @error('name')
            <div class="alert alert-danger py-1 mt-2">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">メールアドレス</label>
          <input type="email" name="email" id="email" class="form-control" placeholder="email" value="{{ old('email') }}" required>
          @error('email')
            <div class="alert alert-danger py-1 mt-2">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">パスワード</label>
          <input type="password" name="password" id="password" class="form-control" placeholder="password" required>
          @error('password')
            <div class="alert alert-danger py-1 mt-2">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="password_confirmation" class="form-label">確認用パスワード</label>
          <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="password_confirmation" required>
        </div>
        <button type="submit" class="btn btn-success w-100">登録する</button>
      </form>
      <div class="mt-3 text-center">
        <a href="{{ asset('login') }}" class="text-decoration-none">ログインはこちら</a>
      </div>
    </div>
  </div>
</div>
@endsection
