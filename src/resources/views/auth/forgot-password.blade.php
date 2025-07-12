@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 400px;">
  <div class="card shadow">
    <div class="card-body">
      <h2 class="card-title text-center mb-4">パスワード再設定</h2>
      <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <p class="mb-3">パスワードを忘れてしまった場合、メールアドレスを入力してください。</p>
        <div class="mb-3">
          <label for="email" class="form-label">メールアドレス</label>
          <input id="email" type="email" name="email" class="form-control" placeholder="email" required autofocus>
        </div>
        <button type="submit" class="btn btn-warning w-100">送信</button>
      </form>
      <div class="mt-3 text-center">
        <a href="{{ asset('login') }}" class="text-decoration-none">ログインはこちら</a><br>
        <a href="{{ asset('register') }}" class="text-decoration-none">会員登録はこちら</a>
      </div>
    </div>
  </div>
</div>
@endsection
