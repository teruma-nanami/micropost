<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>LaraSNS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light px-4">
    <a class="navbar-brand" href="{{ route('home') }}">LaraSNS</a>

    @auth
    <div class="ms-auto d-flex align-items-center gap-3">
      <span class="text-muted">{{ Auth::user()->name }} さん</span>
      <a class="btn btn-outline-primary btn-sm" href="{{ route('tweets.create') }}">投稿する</a>
      <a class="btn btn-outline-secondary btn-sm" href="{{ route('mypage') }}">マイページ</a>
      <form action="{{ route('logout') }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-outline-danger btn-sm">ログアウト</button>
      </form>
    </div>
    @endauth

    @guest
    <div class="ms-auto d-flex gap-2">
      <a class="btn btn-outline-success btn-sm" href="{{ route('login') }}">ログイン</a>
      <a class="btn btn-primary btn-sm" href="{{ route('register') }}">新規登録</a>
    </div>
    @endguest
  </nav>

  <div class="container py-4">
    @yield('content')
  </div>
</body>

</html>