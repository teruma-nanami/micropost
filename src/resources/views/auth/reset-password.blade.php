@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 400px;">
  <div class="card shadow">
    <div class="card-body">
      <h2 class="card-title text-center mb-4">パスワード再設定</h2>
      <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <div class="mb-3">
          <label for="email" class="form-label">メールアドレス</label>
          <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="メールアドレス" required autofocus>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">パスワード</label>
          <input id="password" type="password" name="password" class="form-control" placeholder="パスワード" required>
        </div>
        <div class="mb-3">
          <label for="password_confirmation" class="form-label">確認用パスワード</label>
          <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" placeholder="確認用パスワード" required>
        </div>
        <button type="submit" class="btn btn-warning w-100">パスワードを再設定</button>
      </form>
    </div>
  </div>
</div>
@endsection
