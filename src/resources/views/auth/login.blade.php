@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 400px;">
  <div class="card shadow">
    <div class="card-body">
      <h2 class="card-title text-center mb-4">ログイン</h2>
      <form action="/login" method="post">
        @csrf
        <div class="mb-3">
          <label for="email" class="form-label">メールアドレス</label>
          <input type="email" name="email" id="email" class="form-control" placeholder="email" required autofocus>
          @error('email')
            <div class="alert alert-danger py-1 mt-2">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">パスワード</label>
          <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
          @error('password')
            <div class="alert alert-danger py-1 mt-2">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-check mb-3">
          <input id="remember_me" type="checkbox" name="remember" class="form-check-input">
          <label for="remember_me" class="form-check-label">ログイン状態を保存する</label>
        </div>
        <button type="submit" class="btn btn-primary w-100">ログインする</button>
      </form>
      <div class="mt-3 text-center">
        <a href="{{ asset('forgot-password') }}" class="text-decoration-none">パスワードを忘れてしまった方はこちら</a>
      </div>
    </div>
  </div>
</div>
@endsection
